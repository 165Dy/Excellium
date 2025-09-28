<?php

namespace App\Http\Controllers;

use App\Models\Opportunite;
use App\Models\Postulation;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class OpportuniteController extends Controller
{
    /**
     * Afficher la liste des opportunités
     */
    public function index()
    {
        $opportunites = Opportunite::with('categorie', 'postulations')->get();
        return view('admin.opportunites.index', compact('opportunites'));
    }

    /**
     * Créer une nouvelle opportunité
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie_id' => 'nullable|exists:categories,id',
            'statut' => 'required|in:brouillon,en_ligne,ferme,archive',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'lieu' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'criteres' => 'nullable|array',
            'criteres.*' => 'nullable|string|max:255',
            'info_keys' => 'nullable|array',
            'info_values' => 'nullable|array',
            'info_keys.*' => 'nullable|string|max:255',
            'info_values.*' => 'nullable|string|max:255',
            'fichier_joint' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,txt|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Générer un slug unique
            $slug = Str::slug($request->titre);
            $originalSlug = $slug;
            $counter = 1;
            
            while (Opportunite::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Traiter les critères
            $criteres = null;
            if ($request->criteres && is_array($request->criteres)) {
                $criteres = array_filter($request->criteres, function($critere) {
                    return !empty(trim($critere));
                });
                $criteres = !empty($criteres) ? $criteres : null;
            }

            // Traiter les informations complémentaires
            $informations = null;
            if ($request->info_keys && $request->info_values) {
                $infoArray = [];
                for ($i = 0; $i < count($request->info_keys); $i++) {
                    if (!empty(trim($request->info_keys[$i])) && !empty(trim($request->info_values[$i]))) {
                        $infoArray[trim($request->info_keys[$i])] = trim($request->info_values[$i]);
                    }
                }
                $informations = !empty($infoArray) ? $infoArray : null;
            }

            // Gérer l'upload de fichier
            $fichierPath = null;
            if ($request->hasFile('fichier_joint')) {
                $file = $request->file('fichier_joint');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/opportunites'), $filename);
                $fichierPath = 'uploads/opportunites/' . $filename;
            }

            $opportunite = Opportunite::create([
                'titre' => $request->titre,
                'description' => $request->description,
                'slug' => $slug,
                'categorie_id' => $request->categorie_id,
                'statut' => $request->statut,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'lieu' => $request->lieu,
                'contact_email' => $request->contact_email,
                'criteres' => $criteres,
                'informations' => $informations,
                'fichier_joint' => $fichierPath,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Opportunité créée avec succès',
                'opportunite' => $opportunite->load('categorie')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de l\'opportunité',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Afficher les détails d'une opportunité
     */
    public function show(Opportunite $opportunite)
    {
        $opportunite->load('categorie', 'postulations.user');
        
        return response()->json([
            'success' => true,
            'opportunite' => $opportunite
        ]);
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Opportunite $opportunite)
    {
        $categories = Categorie::all();
        
        return response()->json([
            'success' => true,
            'opportunite' => $opportunite,
            'categories' => $categories
        ]);
    }

    /**
     * Mettre à jour une opportunité
     */
    public function update(Request $request, Opportunite $opportunite)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie_id' => 'nullable|exists:categories,id',
            'statut' => 'required|in:brouillon,en_ligne,ferme,archive',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'lieu' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'criteres' => 'nullable|array',
            'criteres.*' => 'nullable|string|max:255',
            'info_keys' => 'nullable|array',
            'info_values' => 'nullable|array',
            'info_keys.*' => 'nullable|string|max:255',
            'info_values.*' => 'nullable|string|max:255',
            'fichier_joint' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,txt|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Mettre à jour le slug si le titre a changé
            if ($opportunite->titre !== $request->titre) {
                $slug = Str::slug($request->titre);
                $originalSlug = $slug;
                $counter = 1;
                
                while (Opportunite::where('slug', $slug)->where('id', '!=', $opportunite->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                
                $opportunite->slug = $slug;
            }

            // Traiter les critères
            $criteres = null;
            if ($request->criteres && is_array($request->criteres)) {
                $criteres = array_filter($request->criteres, function($critere) {
                    return !empty(trim($critere));
                });
                $criteres = !empty($criteres) ? $criteres : null;
            }

            // Traiter les informations complémentaires
            $informations = null;
            if ($request->info_keys && $request->info_values) {
                $infoArray = [];
                for ($i = 0; $i < count($request->info_keys); $i++) {
                    if (!empty(trim($request->info_keys[$i])) && !empty(trim($request->info_values[$i]))) {
                        $infoArray[trim($request->info_keys[$i])] = trim($request->info_values[$i]);
                    }
                }
                $informations = !empty($infoArray) ? $infoArray : null;
            }

            // Gérer l'upload de fichier
            $fichierPath = $opportunite->fichier_joint; // Conserver l'ancien fichier par défaut
            if ($request->hasFile('fichier_joint')) {
                // Supprimer l'ancien fichier s'il existe
                if ($opportunite->fichier_joint && file_exists(public_path($opportunite->fichier_joint))) {
                    unlink(public_path($opportunite->fichier_joint));
                }
                
                $file = $request->file('fichier_joint');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/opportunites'), $filename);
                $fichierPath = 'uploads/opportunites/' . $filename;
            }

            $opportunite->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'categorie_id' => $request->categorie_id,
                'statut' => $request->statut,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'lieu' => $request->lieu,
                'contact_email' => $request->contact_email,
                'criteres' => $criteres,
                'informations' => $informations,
                'fichier_joint' => $fichierPath,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Opportunité mise à jour avec succès',
                'opportunite' => $opportunite->load('categorie')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour de l\'opportunité',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Supprimer une opportunité
     */
    public function destroy(Opportunite $opportunite)
    {
        try {
            $opportunite->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Opportunité supprimée avec succès'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression de l\'opportunité',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Récupérer les candidats d'une opportunité
     */
    public function getCandidats(Opportunite $opportunite)
    {
        try {
            $candidats = $opportunite->postulations()
                ->with('user')
                ->get()
                ->map(function ($postulation) {
                    return [
                        'id' => $postulation->id,
                        'user_id' => $postulation->user_id,
                        'nom' => $postulation->user->nom,
                        'prenom' => $postulation->user->prenom,
                        'email' => $postulation->user->email,
                        'telephone' => $postulation->user->telephone,
                        'statut' => $postulation->statut,
                        'date_postulation' => $postulation->created_at->format('d/m/Y H:i'),
                        'created_at' => $postulation->created_at
                    ];
                });

            return response()->json([
                'success' => true,
                'candidats' => $candidats,
                'opportunite' => [
                    'id' => $opportunite->id,
                    'titre' => $opportunite->titre
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des candidats',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Changer le statut d'une postulation
     */
    public function changerStatutPostulation(Request $request, Postulation $postulation)
    {
        $validator = Validator::make($request->all(), [
            'statut' => 'required|in:en_attente,accepte,refuse'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Statut invalide',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $postulation->update(['statut' => $request->statut]);
            
            return response()->json([
                'success' => true,
                'message' => 'Statut de la postulation mis à jour avec succès',
                'postulation' => $postulation->fresh()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour du statut',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Afficher la liste publique des opportunités
     */
    public function index_public()
    {
        $opportunites = Opportunite::with(['categorie', 'postulations'])
            ->where('statut', 'en_ligne')
            ->where(function($query) {
                $query->whereNull('date_fin')
                      ->orWhere('date_fin', '>=', now());
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // Compter les postulations pour chaque opportunité
        $opportunites->getCollection()->transform(function ($opportunite) {
            $opportunite->postulations_count = $opportunite->postulations->count();
            return $opportunite;
        });

/*         dd($opportunites);
 */        
        $categories = Categorie::all();

        return view('clients.Opportunites.General.list', compact('opportunites', 'categories'));
    }

    /**
     * Afficher les détails d'une opportunité (vue publique)
     */
    public function show_public($slug)
    {
        $opportunite = Opportunite::with(['categorie', 'postulations.user'])
            ->where('slug', $slug)
            ->where('statut', 'en_ligne')
            ->firstOrFail();

        // Vérifier si l'opportunité est encore ouverte
        if ($opportunite->date_fin && $opportunite->date_fin < now()) {
            abort(404, 'Cette opportunité est fermée');
        }

        // Opportunités similaires
        $similaires = Opportunite::with('categorie')
            ->where('statut', 'en_ligne')
            ->where('id', '!=', $opportunite->id)
            ->where(function($query) use ($opportunite) {
                $query->where('categorie_id', $opportunite->categorie_id)
                      ->orWhere('lieu', $opportunite->lieu);
            })
            ->limit(3)
            ->get();

        return view('clients.Opportunites.General.show', compact('opportunite', 'similaires'));
    }

    /**
     * Traiter une candidature publique
     */
    public function candidature(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'opportunite_id' => 'required|exists:opportunites,id',
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $opportunite = Opportunite::findOrFail($request->opportunite_id);

            // Vérifier si l'opportunité est encore ouverte
            if ($opportunite->statut !== 'en_ligne' || 
                ($opportunite->date_fin && $opportunite->date_fin < now())) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cette opportunité n\'est plus disponible'
                ], 400);
            }

            // Vérifier si l'utilisateur a déjà postulé
            $existingPostulation = Postulation::where('opportunite_id', $opportunite->id)
                ->where('email', $request->email)
                ->first();

            if ($existingPostulation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous avez déjà postulé à cette opportunité'
                ], 400);
            }

            // Créer ou récupérer l'utilisateur
            $user = \App\Models\User::where('email', $request->email)->first();
            
            if (!$user) {
                // Créer un nouvel utilisateur
                $nomPrenom = explode(' ', $request->nom_complet, 2);
                $user = \App\Models\User::create([
                    'nom' => $nomPrenom[1] ?? '',
                    'prenom' => $nomPrenom[0] ?? '',
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'type' => 'participant_autre',
                    'password' => null, // Pas de mot de passe pour les candidatures externes
                ]);
            }

            // Créer la postulation
            $postulation = Postulation::create([
                'uuid' => \Illuminate\Support\Str::uuid(),
                'statut' => 'en_attente',
                'user_id' => $user->id,
                'opportunite_id' => $opportunite->id,
                'message' => $request->message, // Si tu ajoutes ce champ à la table
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Votre candidature a été envoyée avec succès. Nous vous contacterons bientôt.',
                'postulation' => $postulation
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi de la candidature',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
