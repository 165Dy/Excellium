<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssistanceComptableEntreprise;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssistanceComptableController extends Controller
{
    /**
     * Afficher la liste des assistances comptables
     */
    public function index()
    {
        // Vérifier les permissions
        $this->checkAdminPermissions();

        $assistances = AssistanceComptableEntreprise::with(['user', 'entreprise'])
            ->byAdmins()
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.assistance_comptable.index', compact('assistances'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $this->checkAdminPermissions();

        $entreprises = Entreprise::orderBy('nom')->get();
        $admins = User::whereIn('type', ['admin', 'super_admin'])->orderBy('nom')->get();

        return view('admin.assistance_comptable.create', compact('entreprises', 'admins'));
    }

    /**
     * Enregistrer une nouvelle assistance
     */
    public function store(Request $request)
    {
        $this->checkAdminPermissions();

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'entreprise_id' => 'required|exists:entreprises,id',
            'description' => 'required|string',
            'prix_indicatif' => 'nullable|numeric|min:0',
            'duree_estimee' => 'nullable|integer|min:1',
            'caracteristiques' => 'nullable|array',
            'type_contrat' => 'required|in:mensuel_renouvelable,factuel_objectif,annuel,ponctuel',
            'frequence_facturation' => 'required|in:mensuelle,trimestrielle,fin_mission,sur_mesure',
            'objectifs' => 'nullable|string',
            'renouvellement_auto' => 'boolean',
            'date_debut' => 'nullable|date',
            'date_fin_prevue' => 'nullable|date|after_or_equal:date_debut',
        ]);

        // Vérifier que l'utilisateur est admin/super_admin
        $user = User::find($validated['user_id']);
        if (!in_array($user->type, ['admin', 'super_admin'])) {
            return back()->withErrors(['user_id' => 'Seuls les administrateurs peuvent être assignés aux assistances.']);
        }

        DB::beginTransaction();
        try {
            // Créer l'assistance
            $assistance = AssistanceComptableEntreprise::create($validated);

            // Marquer l'entreprise comme assistée si ce n'est pas déjà fait
            $entreprise = Entreprise::find($validated['entreprise_id']);
            if (!$entreprise->assist) {
                $entreprise->marquerCommeAssistee();
            }

            DB::commit();

            return redirect()->route('admin.assistance_comptable.index')
                ->with('success', 'Assistance comptable créée avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    /**
     * Afficher les détails d'une assistance
     */
    public function show(AssistanceComptableEntreprise $assistance)
    {
        $this->checkAdminPermissions();

        $assistance->load(['user', 'entreprise']);

        return view('admin.assistance_comptable.show', compact('assistance'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(AssistanceComptableEntreprise $assistance)
    {
        $this->checkAdminPermissions();

        $entreprises = Entreprise::orderBy('nom')->get();
        $admins = User::whereIn('type', ['admin', 'super_admin'])->orderBy('nom')->get();

        return view('admin.assistance_comptable.edit', compact('assistance', 'entreprises', 'admins'));
    }

    /**
     * Mettre à jour une assistance
     */
    public function update(Request $request, AssistanceComptableEntreprise $assistance)
    {
        $this->checkAdminPermissions();

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'entreprise_id' => 'required|exists:entreprises,id',
            'description' => 'required|string',
            'prix_indicatif' => 'nullable|numeric|min:0',
            'duree_estimee' => 'nullable|integer|min:1',
            'caracteristiques' => 'nullable|array',
            'type_contrat' => 'required|in:mensuel_renouvelable,factuel_objectif,annuel,ponctuel',
            'statut' => 'required|in:brouillon,en_negociation,valide,en_cours,suspendu,termine,annule',
            'frequence_facturation' => 'required|in:mensuelle,trimestrielle,fin_mission,sur_mesure',
            'objectifs' => 'nullable|string',
            'renouvellement_auto' => 'boolean',
            'date_debut' => 'nullable|date',
            'date_fin_prevue' => 'nullable|date|after_or_equal:date_debut',
            'date_fin_reelle' => 'nullable|date',
            'prochaine_echeance' => 'nullable|date',
        ]);

        // Vérifier que l'utilisateur est admin/super_admin
        $user = User::find($validated['user_id']);
        if (!in_array($user->type, ['admin', 'super_admin'])) {
            return back()->withErrors(['user_id' => 'Seuls les administrateurs peuvent être assignés aux assistances.']);
        }

        $assistance->update($validated);

        return redirect()->route('admin.assistance_comptable.show', $assistance)
            ->with('success', 'Assistance comptable mise à jour avec succès.');
    }

    /**
     * Supprimer une assistance
     */
    public function destroy(AssistanceComptableEntreprise $assistance)
    {
        $this->checkAdminPermissions();

        $entrepriseId = $assistance->entreprise_id;
        $assistance->delete();

        // Vérifier s'il reste des assistances pour cette entreprise
        $autresAssistances = AssistanceComptableEntreprise::where('entreprise_id', $entrepriseId)
            ->actives()
            ->exists();

        // Si plus d'assistances actives, marquer l'entreprise comme non assistée
        if (!$autresAssistances) {
            $entreprise = Entreprise::find($entrepriseId);
            $entreprise->marquerCommeNonAssistee();
        }

        return redirect()->route('admin.assistance_comptable.index')
            ->with('success', 'Assistance comptable supprimée avec succès.');
    }

    /**
     * Changer le statut d'une assistance
     */
    public function updateStatut(Request $request, AssistanceComptableEntreprise $assistance)
    {
        $this->checkAdminPermissions();

        $request->validate([
            'statut' => 'required|in:brouillon,en_negociation,valide,en_cours,suspendu,termine,annule'
        ]);

        $assistance->update(['statut' => $request->statut]);

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès.',
            'badge' => $assistance->getStatutBadge()
        ]);
    }

    /**
     * Obtenir les assistances par entreprise (AJAX)
     */
    public function getByEntreprise(Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        $assistances = $entreprise->assistancesComptables()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($assistances);
    }

    /**
     * Obtenir les assistances par administrateur (AJAX)
     */
    public function getByAdmin(User $user)
    {
        $this->checkAdminPermissions();

        if (!in_array($user->type, ['admin', 'super_admin'])) {
            return response()->json(['error' => 'Utilisateur non autorisé'], 403);
        }

        $assistances = $user->assistancesComptables()
            ->with('entreprise')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($assistances);
    }

    /**
     * Vérifier les permissions d'accès
     */
    private function checkAdminPermissions()
    {
        if (!Auth::check() || !in_array(Auth::user()->type, ['admin', 'super_admin'])) {
            abort(403, 'Accès non autorisé. Seuls les administrateurs peuvent gérer les assistances comptables.');
        }
    }
}
