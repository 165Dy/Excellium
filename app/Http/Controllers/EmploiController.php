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
use Mailgun\Mailgun;
use App\Services\SuperAdminNotificationService;

class EmploiController extends Controller
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
            $emplois = Emploi::all();
            Log::info('Nombre d\'opportunités via Eloquent: ' . $emplois->count());
            
            // Ajouter les variables de sécurité pour le layout
            $categories = \App\Models\Categorie::all() ?? collect();
            $formations = \App\Models\Formation::all() ?? collect();
            
            return view('admin.emplois.index', compact('emplois', 'categories', 'formations'));
            
        } catch (\Exception $e) {
            Log::error('Erreur dans EmploiController@index: ' . $e->getMessage());
            
            // Retourner une vue d'erreur ou rediriger
            return view('admin.emplois.index', [
                'emplois' => collect(),
                'categories' => collect(),
                'formations' => collect(),
                'error' => $e->getMessage()
            ]);
        }
    }


     public function index_public()
    {
        try {
            // Debug : vérifier la connexion à la base
            Log::info('=== DEBUG OPPORTUNITES ===');
            
            // Compter les emplois directement
            $count = DB::table('emplois')->count();
            Log::info('Nombre d\'emplois dans la table: ' . $count);
            
            // Récupérer avec Eloquent
            $emplois = Emploi::all();
            Log::info('Nombre d\'opportunités via Eloquent: ' . $emplois->count());
            
            // Ajouter les variables de sécurité pour le layout
            $categories = \App\Models\Categorie::all() ?? collect();
            $formations = \App\Models\Formation::all() ?? collect();
            
            return view('clients.Emplois.index', compact('emplois', 'categories', 'formations'));
            
        } catch (\Exception $e) {
            Log::error('Erreur dans EmploiController@index: ' . $e->getMessage());
            
            // Retourner une vue d'erreur ou rediriger
            return view('clients.Emplois.index', [
                'emplois' => collect(),
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
        // Ajouter les variables nécessaires pour le layout admin
        $categories = \App\Models\Categorie::all() ?? collect();
        $formations = \App\Models\Formation::all() ?? collect();
        
        return view('admin.emplois.create', compact('categories', 'formations'));
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

            return redirect()->route('admin.emplois.index')
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
        $emploi = Emploi::with(['candidatures' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        // Ajouter les variables nécessaires pour le layout admin
        $categories = \App\Models\Categorie::all() ?? collect();
        $formations = \App\Models\Formation::all() ?? collect();

        return view('admin.emplois.show', compact('emploi', 'categories', 'formations'));
    }

    public function show_public($id)
    {
        $emploi = Emploi::with(['candidatures' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return view('clients.Emplois.show', compact('emploi'));
    }
    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $emploi = Emploi::findOrFail($id);
        
        // Ajouter les variables nécessaires pour le layout admin
        $categories = \App\Models\Categorie::all() ?? collect();
        $formations = \App\Models\Formation::all() ?? collect();
        
        return view('admin.emplois.edit', compact('emploi', 'categories', 'formations'));
    }

    /**
     * Mettre à jour une opportunité
     */
    public function update(Request $request, $id)
    {
        $emploi = Emploi::findOrFail($id);

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
            $emploi->update($request->all());

            Log::info('Opportunité mise à jour:', [
                'id' => $emploi->id,
                'titre' => $emploi->titre,
                'admin' => 'Excellium Conseils'
            ]);

            return redirect()->route('admin.emplois.index')
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
            $emploi = Emploi::findOrFail($id);
            
            // Supprimer les CVs associés
            foreach ($emploi->candidatures as $candidature) {
                if ($candidature->cv_path && Storage::disk('public')->exists($candidature->cv_path)) {
                    Storage::disk('public')->delete($candidature->cv_path);
                }
            }
            
            $titre = $emploi->titre;
            $emploi->delete();

            Log::info('Opportunité supprimée:', [
                'id' => $id,
                'titre' => $titre,
                'admin' => 'Excellium Conseils'
            ]);

            return redirect()->route('admin.emplois.index')
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
            $emploi = Emploi::with(['candidatures' => function($query) {
                $query->orderBy('created_at', 'desc');
            }])->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'emploi' => $emploi,
                'candidatures' => $emploi->candidatures
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
    public function exportCandidatures($emploi_id)
    {
        try {
            $emploi = Emploi::with('candidatures')->findOrFail($emploi_id);
            
            $filename = 'candidatures_' . Str::slug($emploi->titre) . '_' . date('Y-m-d') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            
            $callback = function() use ($emploi) {
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
                foreach ($emploi->candidatures as $candidature) {
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
                'emploi_id' => $emploi_id,
                'error' => $e->getMessage()
            ]);
            
            return back()->with('error', 'Erreur lors de l\'export');
        }
    }

    public function postuler(Request $request)
    {
        $request->validate([
            'emploi_id' => 'required|exists:emplois,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'lettre_motivation' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            // Sauvegarde du CV
            $cvPath = null;
            if ($request->hasFile('file')) {
                $cvPath = $request->file('file')->store('cvs', 'public');
            }

            // Sauvegarde de la lettre de motivation
            $lettrePath = null;
            if ($request->hasFile('lettre_motivation')) {
                $lettrePath = $request->file('lettre_motivation')->store('lettres_motivation', 'public');
            }

            // Création de la candidature
            $candidature = Candidature::create([
                'emploi_id' => $request->emploi_id,
                'nom' => $request->nom,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'cv_path' => $cvPath,
                'lettre_motivation' => $lettrePath,
                'message' => $request->message,
                'statut' => 'en_attente',
            ]);

            // Charger la relation emploi
            $emploi = Emploi::find($request->emploi_id);
            
            // ✅ ENVOYER EMAIL AUX SUPER_ADMIN
            try {
                $emailData = SuperAdminNotificationService::prepareEmploiCandidatureData($candidature, $emploi);
                SuperAdminNotificationService::sendNotification($emailData);
                Log::info("Email envoyé aux super_admin pour nouvelle candidature");
            } catch (\Exception $e) {
                Log::error("Erreur envoi email super_admin (candidature): " . $e->getMessage());
            }

            // Préparation des variables pour l'email
            $variables = [
                'nom' => $candidature->nom,
                'poste' => $emploi->titre,
                'type_contrat' => $emploi->type_contrat,
                'localisation' => $emploi->localisation,
                'entreprise' => $emploi->entreprise,
                'cv_joint' => $cvPath ? 'Oui' : 'Non',
                'lettre_jointe' => $lettrePath ? 'Oui' : 'Non',
            ];

            // Envoi de l'email via Mailgun
            $mg = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.eu.mailgun.net');
            $mg->messages()->send(env('MAILGUN_DOMAIN'), [
                'from' => 'contact@excelliumconseils.com',
                'to' => $candidature->email,
                'subject' => 'Confirmation de réception de votre candidature',
                'template' => 'excellium_candidature_confirmation',
                'h:X-Mailgun-Variables' => json_encode($variables),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Votre candidature a été envoyée avec succès !'
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la candidature:', [
                'error' => $e->getMessage(),
                'user' => $request->email
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'envoi de votre candidature.'
            ], 500);
        }
    }

       
    /**
     * Afficher la liste des candidats
     */
    public function candidats()
    {
        // Récupère toutes les candidatures avec l'emploi associé
        $candidats = Candidature::with('emploi')->orderBy('created_at', 'desc')->get();
        
        // Ajouter les variables nécessaires pour le layout admin
        $categories = \App\Models\Categorie::all() ?? collect();
        $formations = \App\Models\Formation::all() ?? collect();
    
        return view('admin.emplois.list_candidats', compact('candidats', 'categories', 'formations'));
    }

    /**
     * Afficher une candidature spécifique
     */
    public function showCandidature(Candidature $candidature)
    {
        $candidature->load('emploi');
        
        // Ajouter les variables nécessaires pour le layout admin
        $categories = \App\Models\Categorie::all() ?? collect();
        $formations = \App\Models\Formation::all() ?? collect();
        
        // La vue 'show_candidat' devra être créée
        return view('admin.emplois.show_candidat', compact('candidature', 'categories', 'formations'));
    }

} 