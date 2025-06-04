<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OpportuniteController extends Controller
{
    /**
     * Afficher la liste des opportunités
     */
    public function index()
    {
        try {
            // Debug : vérifier la connexion à la base
            Log::info('=== DEBUG OPPORTUNITES ===');
            
            // Compter les emplois directement
            $count = DB::table('emplois')->count();
            Log::info('Nombre d\'emplois dans la table: ' . $count);
            
            // Récupérer avec Eloquent
            $opportunites = Emploi::all();
            Log::info('Nombre d\'opportunités via Eloquent: ' . $opportunites->count());
            
            // Ajouter les variables de sécurité pour le layout
            $categories = \App\Models\Categorie::all() ?? collect();
            $formations = \App\Models\Formation::all() ?? collect();
            
            return view('admin.opportunites.index', compact('opportunites', 'categories', 'formations'));
            
        } catch (\Exception $e) {
            Log::error('Erreur dans OpportuniteController@index: ' . $e->getMessage());
            
            // Retourner une vue d'erreur ou rediriger
            return view('admin.opportunites.index', [
                'opportunites' => collect(),
                'categories' => collect(),
                'formations' => collect(),
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('admin.opportunites.create');
    }

    /**
     * Enregistrer une nouvelle opportunité
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'entreprise' => 'required|string|max:255',
            'type_contrat' => 'required|in:CDI,CDD,Stage,Freelance,Alternance',
            'localisation' => 'required|string|max:255',
            'date_expiration' => 'required|date|after:today',
            'nombre_postes' => 'required|integer|min:1',
            'salaire_min' => 'nullable|numeric|min:0',
            'salaire_max' => 'nullable|numeric|min:0|gte:salaire_min',
            'contact_email' => 'nullable|email',
            'contact_telephone' => 'nullable|string',
        ]);

        try {
            Emploi::create($request->all());

            Log::info('Nouvelle opportunité créée:', [
                'titre' => $request->titre,
                'entreprise' => $request->entreprise,
                'admin' => 'Excellium Conseils'
            ]);

            return redirect()->route('admin.opportunites.index')
                ->with('success', 'Opportunité créée avec succès !');

        } catch (\Exception $e) {
            Log::error('Erreur création opportunité:', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);

            return back()->withInput()
                ->with('error', 'Erreur lors de la création de l\'opportunité.');
        }
    }

    /**
     * Afficher une opportunité
     */
    public function show($id)
    {
        $opportunite = Emploi::with(['candidatures' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return view('admin.opportunites.show', compact('opportunite'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $opportunite = Emploi::findOrFail($id);
        return view('admin.opportunites.edit', compact('opportunite'));
    }

    /**
     * Mettre à jour une opportunité
     */
    public function update(Request $request, $id)
    {
        $opportunite = Emploi::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'entreprise' => 'required|string|max:255',
            'type_contrat' => 'required|in:CDI,CDD,Stage,Freelance,Alternance',
            'localisation' => 'required|string|max:255',
            'date_expiration' => 'required|date',
            'nombre_postes' => 'required|integer|min:1',
            'salaire_min' => 'nullable|numeric|min:0',
            'salaire_max' => 'nullable|numeric|min:0|gte:salaire_min',
            'contact_email' => 'nullable|email',
            'contact_telephone' => 'nullable|string',
        ]);

        try {
            $opportunite->update($request->all());

            Log::info('Opportunité mise à jour:', [
                'id' => $opportunite->id,
                'titre' => $opportunite->titre,
                'admin' => 'Excellium Conseils'
            ]);

            return redirect()->route('admin.opportunites.index')
                ->with('success', 'Opportunité mise à jour avec succès !');

        } catch (\Exception $e) {
            Log::error('Erreur mise à jour opportunité:', [
                'id' => $id,
                'error' => $e->getMessage()
            ]);

            return back()->withInput()
                ->with('error', 'Erreur lors de la mise à jour.');
        }
    }

    /**
     * Supprimer une opportunité
     */
    public function destroy($id)
    {
        try {
            $opportunite = Emploi::findOrFail($id);
            
            // Supprimer les CVs associés
            foreach ($opportunite->candidatures as $candidature) {
                if ($candidature->cv_path && Storage::disk('public')->exists($candidature->cv_path)) {
                    Storage::disk('public')->delete($candidature->cv_path);
                }
            }
            
            $titre = $opportunite->titre;
            $opportunite->delete();

            Log::info('Opportunité supprimée:', [
                'id' => $id,
                'titre' => $titre,
                'admin' => 'Excellium Conseils'
            ]);

            return redirect()->route('admin.opportunites.index')
                ->with('success', 'Opportunité supprimée avec succès !');

        } catch (\Exception $e) {
            Log::error('Erreur suppression opportunité:', [
                'id' => $id,
                'error' => $e->getMessage()
            ]);

            return back()->with('error', 'Erreur lors de la suppression.');
        }
    }

    /**
     * Récupérer les détails d'une opportunité avec candidatures (AJAX)
     */
    public function getDetails($id)
    {
        try {
            $opportunite = Emploi::with(['candidatures' => function($query) {
                $query->orderBy('created_at', 'desc');
            }])->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'opportunite' => $opportunite,
                'candidatures' => $opportunite->candidatures
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur récupération détails opportunité:', [
                'id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Opportunité introuvable'
            ], 404);
        }
    }

    /**
     * Changer le statut d'une candidature
     */
    public function changerStatutCandidature(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:en_attente,accepte,refuse'
        ]);

        try {
            $candidature = Candidature::findOrFail($id);
            $candidature->update(['statut' => $request->statut]);

            Log::info('Statut candidature modifié:', [
                'candidature_id' => $id,
                'nouveau_statut' => $request->statut,
                'admin' => 'Excellium Conseils'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Statut mis à jour avec succès',
                'nouveau_statut' => $request->statut
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur changement statut candidature:', [
                'id' => $id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour'
            ], 500);
        }
    }

    /**
     * Exporter les candidatures en CSV
     */
    public function exportCandidatures($opportunite_id)
    {
        try {
            $opportunite = Emploi::with('candidatures')->findOrFail($opportunite_id);
            
            $filename = 'candidatures_' . Str::slug($opportunite->titre) . '_' . date('Y-m-d') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            
            $callback = function() use ($opportunite) {
                $file = fopen('php://output', 'w');
                
                // En-têtes CSV
                fputcsv($file, [
                    'Nom complet',
                    'Email', 
                    'Téléphone',
                    'Message',
                    'Statut',
                    'Date candidature'
                ]);
                
                // Données
                foreach ($opportunite->candidatures as $candidature) {
                    fputcsv($file, [
                        $candidature->nom,
                        $candidature->email,
                        $candidature->telephone,
                        $candidature->message ?: 'Aucun message',
                        ucfirst(str_replace('_', ' ', $candidature->statut)),
                        $candidature->created_at->format('d/m/Y H:i')
                    ]);
                }
                
                fclose($file);
            };
            
            return Response::stream($callback, 200, $headers);
            
        } catch (\Exception $e) {
            Log::error('Erreur export candidatures:', [
                'opportunite_id' => $opportunite_id,
                'error' => $e->getMessage()
            ]);
            
            return back()->with('error', 'Erreur lors de l\'export');
        }
    }
} 