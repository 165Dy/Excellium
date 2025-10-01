<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EntrepriseController extends Controller
{
    /**
     * Afficher la liste des entreprises
     */
    public function index(Request $request)
    {
        $this->checkAdminPermissions();

        $query = Entreprise::withCount([
            'assistancesComptables',
            'assistancesActives',
            'assistancesTerminees'
        ]);

        // Filtres dynamiques
        $this->applyFilters($query, $request);

        $entreprises = $query->orderBy('nom')->paginate(15);
        
        // Conserver les paramètres de filtrage dans la pagination
        $entreprises->appends($request->query());

        // Données pour les filtres
        $filterData = $this->getFilterData();

        // Export CSV si demandé
        if ($request->has('export') && $request->export === 'csv') {
            return $this->exportToCsv($query);
        }

        return view('admin.entreprises.index', compact('entreprises', 'filterData'));
    }

    /**
     * Appliquer les filtres dynamiquement
     */
    private function applyFilters($query, Request $request)
    {
        // Filtre par statut d'assistance
        if ($request->filled('assist')) {
            $query->where('assist', $request->assist === '1');
        }

        // Filtre par activité
        if ($request->filled('activite')) {
            $query->where('activite', 'LIKE', '%' . $request->activite . '%');
        }

        // Filtre par localisation
        if ($request->filled('localisation')) {
            $query->where('situation_geographique', 'LIKE', '%' . $request->localisation . '%');
        }

        // Filtre par dirigeant
        if ($request->filled('dirigeant')) {
            $query->where('nom_dirigeant', 'LIKE', '%' . $request->dirigeant . '%');
        }

        // Recherche globale
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nom', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('activite', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('situation_geographique', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('nom_dirigeant', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('rccm', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('ncc', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Filtre par nombre d'assistances
        if ($request->filled('assistances_min')) {
            $query->has('assistancesComptables', '>=', $request->assistances_min);
        }

        if ($request->filled('assistances_max')) {
            $query->has('assistancesComptables', '<=', $request->assistances_max);
        }

        // Tri dynamique
        if ($request->filled('sort_by')) {
            $sortBy = $request->sort_by;
            $sortDirection = $request->get('sort_direction', 'asc');
            
            switch ($sortBy) {
                case 'nom':
                    $query->orderBy('nom', $sortDirection);
                    break;
                case 'assist':
                    $query->orderBy('assist', $sortDirection);
                    break;
                case 'created_at':
                    $query->orderBy('created_at', $sortDirection);
                    break;
                case 'assistances_count':
                    $query->withCount('assistancesComptables')
                          ->orderBy('assistances_comptables_count', $sortDirection);
                    break;
                default:
                    $query->orderBy('nom', 'asc');
            }
        }
    }

    /**
     * Obtenir les données pour les filtres
     */
    private function getFilterData()
    {
        return [
            'localisations' => Entreprise::distinct()
                ->whereNotNull('situation_geographique')
                ->pluck('situation_geographique')
                ->filter()
                ->sort()
                ->values(),
            
            'activites' => Entreprise::distinct()
                ->whereNotNull('activite')
                ->pluck('activite')
                ->map(function($activite) {
                    return \Illuminate\Support\Str::limit($activite, 50);
                })
                ->unique()
                ->filter()
                ->sort()
                ->values(),
                
            'dirigeants' => Entreprise::distinct()
                ->whereNotNull('nom_dirigeant')
                ->pluck('nom_dirigeant')
                ->filter()
                ->sort()
                ->values(),
                
            'stats' => [
                'total' => Entreprise::count(),
                'assistees' => Entreprise::where('assist', true)->count(),
                'non_assistees' => Entreprise::where('assist', false)->count(),
                'avec_assistances' => Entreprise::has('assistancesComptables')->count(),
            ]
        ];
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $this->checkAdminPermissions();

        return view('admin.entreprises.create');
    }

    /**
     * Enregistrer une nouvelle entreprise
     */
    public function store(Request $request)
    {
        $this->checkAdminPermissions();

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'activite' => 'nullable|string',
            'situation_geographique' => 'nullable|string|max:255',
            'rccm' => 'nullable|string|max:50',
            'ncc' => 'nullable|string|max:50',
            'nom_dirigeant' => 'nullable|string|max:150',
            'tdu' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'assist' => 'boolean'
        ]);

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('entreprises', 'public');
            $validated['image'] = $imagePath;
        }

        $entreprise = Entreprise::create($validated);

        return redirect()->route('admin.entreprises.index')
            ->with('success', 'Entreprise créée avec succès.');
    }

    /**
     * Afficher les détails d'une entreprise
     */
    public function show(Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        $entreprise->load(['assistancesComptables.user']);
        $admins = User::whereIn('type', ['admin', 'super_admin'])->orderBy('nom')->get();

        return view('admin.entreprises.show', compact('entreprise', 'admins'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        return view('admin.entreprises.edit', compact('entreprise'));
    }

    /**
     * Mettre à jour une entreprise
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'activite' => 'nullable|string',
            'situation_geographique' => 'nullable|string|max:255',
            'rccm' => 'nullable|string|max:50',
            'ncc' => 'nullable|string|max:50',
            'nom_dirigeant' => 'nullable|string|max:150',
            'tdu' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'assist' => 'boolean'
        ]);

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($entreprise->image) {
                Storage::disk('public')->delete($entreprise->image);
            }
            
            $imagePath = $request->file('image')->store('entreprises', 'public');
            $validated['image'] = $imagePath;
        }

        $entreprise->update($validated);

        return redirect()->route('admin.entreprises.show', $entreprise)
            ->with('success', 'Entreprise mise à jour avec succès.');
    }

    /**
     * Supprimer une entreprise
     */
    public function destroy(Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        try {
            // Vérifier s'il y a des assistances actives
            $assistancesActives = $entreprise->assistancesActives()->count();
            
            if ($assistancesActives > 0) {
                $message = 'Impossible de supprimer cette entreprise car elle a ' . $assistancesActives . ' assistance(s) comptable(s) active(s).';
                
                // Retourner JSON si requis, sinon redirection
                if (request()->expectsJson() || request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message
                    ], 422);
                }
                
                return redirect()->route('admin.entreprises.index')
                    ->with('error', $message);
            }

            // Vérifier s'il y a des assistances terminées (information)
            $assistancesTotal = $entreprise->assistancesComptables()->count();
            
            // Supprimer l'image si elle existe
            if ($entreprise->image) {
                Storage::disk('public')->delete($entreprise->image);
            }

            $nomEntreprise = $entreprise->nom;
            $entreprise->delete();

            $message = "L'entreprise \"$nomEntreprise\" a été supprimée avec succès.";
            if ($assistancesTotal > 0) {
                $message .= " ($assistancesTotal assistance(s) archivée(s))";
            }

            // Retourner JSON si requis, sinon redirection
            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $message
                ]);
            }

            return redirect()->route('admin.entreprises.index')
                ->with('success', $message);
                
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la suppression d\'entreprise: ' . $e->getMessage());
            
            $errorMessage = 'Une erreur est survenue lors de la suppression de l\'entreprise.';
            
            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], 500);
            }
            
            return redirect()->route('admin.entreprises.index')
                ->with('error', $errorMessage);
        }
    }

    /**
     * Créer une assistance comptable pour cette entreprise
     */
    public function createAssistance(Request $request, Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'description' => 'required|string|min:10',
                'prix_indicatif' => 'nullable|numeric|min:0',
                'duree_estimee' => 'nullable|integer|min:1',
                'type_contrat' => 'required|in:mensuel_renouvelable,factuel_objectif,annuel,ponctuel',
                'frequence_facturation' => 'required|in:mensuelle,trimestrielle,fin_mission,sur_mesure',
                'objectifs' => 'nullable|string',
                'renouvellement_auto' => 'boolean',
                'date_debut' => 'nullable|date|after_or_equal:today',
                'date_fin_prevue' => 'nullable|date|after_or_equal:date_debut',
            ], [
                'user_id.required' => 'Veuillez sélectionner un administrateur responsable.',
                'description.required' => 'La description est obligatoire.',
                'description.min' => 'La description doit contenir au moins 10 caractères.',
                'type_contrat.required' => 'Le type de contrat est obligatoire.',
                'frequence_facturation.required' => 'La fréquence de facturation est obligatoire.',
                'date_debut.after_or_equal' => 'La date de début doit être aujourd\'hui ou dans le futur.',
                'date_fin_prevue.after_or_equal' => 'La date de fin prévue doit être après la date de début.'
            ]);

            // Vérifier que l'utilisateur est admin/super_admin
            $user = User::find($validated['user_id']);
            if (!in_array($user->type, ['admin', 'super_admin'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Seuls les administrateurs peuvent être assignés aux assistances.'
                ], 400);
            }

            // Vérifier si l'administrateur a déjà une assistance active pour cette entreprise
            $assistanceExistante = $entreprise->assistancesComptables()
                ->where('user_id', $validated['user_id'])
                ->actives()
                ->first();

            if ($assistanceExistante) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cet administrateur a déjà une assistance active pour cette entreprise.'
                ], 400);
            }

            // Créer l'assistance
            $validated['entreprise_id'] = $entreprise->id;
            $assistance = $entreprise->assistancesComptables()->create($validated);

            // Marquer l'entreprise comme assistée si ce n'est pas déjà fait
            if (!$entreprise->assist) {
                $entreprise->marquerCommeAssistee();
            }

            return response()->json([
                'success' => true,
                'message' => "Assistance comptable créée avec succès pour {$entreprise->nom}.",
                'assistance' => $assistance->load('user')
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation : ' . implode(' ', $e->validator->errors()->all())
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la création d\'assistance: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la création de l\'assistance.'
            ], 500);
        }
    }

    /**
     * Basculer le statut d'assistance d'une entreprise
     */
    public function toggleAssist(Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        $newStatus = !$entreprise->assist;
        $entreprise->update(['assist' => $newStatus]);

        $message = $newStatus ? 'Entreprise marquée comme assistée' : 'Entreprise marquée comme non assistée';

        return response()->json([
            'success' => true,
            'message' => $message,
            'assist' => $newStatus
        ]);
    }

    /**
     * Obtenir les statistiques d'une entreprise
     */
    public function getStats(Entreprise $entreprise)
    {
        $this->checkAdminPermissions();

        $stats = [
            'total_assistances' => $entreprise->assistancesComptables()->count(),
            'assistances_actives' => $entreprise->assistancesActives()->count(),
            'assistances_terminees' => $entreprise->assistancesTerminees()->count(),
            'derniere_assistance' => $entreprise->getDerniereAssistance()?->load('user'),
        ];

        return response()->json($stats);
    }

    /**
     * Exporter les résultats en CSV
     */
    private function exportToCsv($query)
    {
        // Obtenir toutes les entreprises sans pagination pour l'export
        $entreprises = $query->with(['assistancesComptables', 'assistancesActives'])->get();
        
        $filename = 'entreprises_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ];

        $callback = function() use ($entreprises) {
            $file = fopen('php://output', 'w');
            
            // BOM pour UTF-8 (pour Excel)
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // En-têtes CSV
            fputcsv($file, [
                'Nom',
                'Activité',
                'Localisation',
                'Dirigeant',
                'RCCM',
                'NCC',
                'TDU',
                'Assistée',
                'Nb Total Assistances',
                'Assistances Actives',
                'Assistances Terminées',
                'Date Création',
                'Dernière Modification'
            ], ';'); // Utiliser ; comme séparateur pour Excel français

            // Données
            foreach ($entreprises as $entreprise) {
                fputcsv($file, [
                    $entreprise->nom ?: '',
                    $entreprise->activite ?: '',
                    $entreprise->situation_geographique ?: '',
                    $entreprise->nom_dirigeant ?: '',
                    $entreprise->rccm ?: '',
                    $entreprise->ncc ?: '',
                    $entreprise->tdu ?: '',
                    $entreprise->assist ? 'Oui' : 'Non',
                    $entreprise->assistancesComptables->count(),
                    $entreprise->assistancesActives->count(),
                    $entreprise->assistancesComptables->where('statut', 'termine')->count() + 
                    $entreprise->assistancesComptables->where('statut', 'annule')->count(),
                    $entreprise->created_at->format('d/m/Y H:i'),
                    $entreprise->updated_at->format('d/m/Y H:i')
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Vérifier les permissions d'accès
     */
    private function checkAdminPermissions()
    {
        if (!Auth::check() || !in_array(Auth::user()->type, ['admin', 'super_admin'])) {
            abort(403, 'Accès non autorisé. Seuls les administrateurs peuvent gérer les entreprises.');
        }
    }
}
