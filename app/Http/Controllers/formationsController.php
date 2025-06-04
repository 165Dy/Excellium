<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;  
use Illuminate\Support\Facades\Log;    
use Illuminate\Support\Facades\DB;
use App\Models\InscriptionFormation;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class formationsController extends Controller
{
    public function index_public(Request $request)
    {
        $categories = Categorie::all();
        $query = Formation::with('categorie');

        // Filtre par catégorie
        if ($request->has('categorie_id') && $request->categorie_id) {
            $query->where('categorie_id', $request->categorie_id);
        }

        // Recherche par titre ou programme
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('titre', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('programme', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Trier et paginer (au lieu de get())
        $formations = $query->orderBy('date_debut', 'asc')
                           ->orderBy('created_at', 'desc')
                           ->paginate(9); // 9 formations par page (3x3)

        return view('clients.Formations.index', compact('formations', 'categories'));
    }

    public function show_public($id)
    {
        $categories = Categorie::all();
        $formations = Formation::with('categorie')->findOrFail($id);
        
        return view('clients.Formations.show', compact('formations','categories'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('layouts.admin', compact('categories'));
    }

    public function  store(Request $request)
    {
        try {
            Log::info("=== DÉBUT CRÉATION FORMATION ===");
            Log::info("Toutes les données reçues:", $request->all());
            Log::info("Fichiers reçus:", $request->allFiles());
            
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'categorie_id' => 'required|exists:categories,id',
                'programme' => 'nullable|string',
                'cout' => 'nullable|numeric',
                'prerequis' => 'nullable|string',
                'bonus' => 'nullable|string',
                'lieu' => 'nullable|string|max:255',
                'date_debut' => [
                    'nullable',
                    'date',
                    'after_or_equal:today'  // Ne peut pas être antérieure à aujourd'hui
                ],
                'date_fin' => [
                    'nullable',
                    'date',
                    'after_or_equal:date_debut'  // Ne peut pas être antérieure à date_debut
                ],
                'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mov,wmv|max:153600',
            ], [
                // Messages d'erreur personnalisés
                'date_debut.after_or_equal' => 'La date de début ne peut pas être antérieure à aujourd\'hui.',
                'date_fin.after_or_equal' => 'La date de fin doit être postérieure ou égale à la date de début.',
            ]);

            Log::info("Validation réussie:", $validated);

            // Gérer l'upload du fichier
            if ($request->hasFile('file')) {
                Log::info("Fichier détecté pour création");
                
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('formations', $fileName, 'public');
                
                $mimeType = $file->getMimeType();
                $fileType = str_starts_with($mimeType, 'image/') ? 'image' : 'video';
                
                $validated['file_path'] = $filePath;
                $validated['file_type'] = $fileType;
                
                Log::info("Fichier sauvegardé: $filePath");
            }

            unset($validated['file']);
            $formation = Formation::create($validated);
            $formation->load('categorie');

            Log::info("Formation créée avec succès - ID: " . $formation->id);
            Log::info("=== FIN CRÉATION FORMATION ===");

            // Retourner du JSON pour AJAX
            if ($request->expectsJson() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => true,
                    'message' => 'Formation créée avec succès !',
                    'data' => $formation
                ], 201);
            }

            // Fallback pour requête normale (au cas où)
            return redirect()->route('dashboard')->with('success', 'Formation créée avec succès !');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("Erreur de validation création:", $e->errors());
            
            if ($request->expectsJson() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation',
                    'errors' => $e->errors()
                ], 422);
            }

            return back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            Log::error('Erreur création formation: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->expectsJson() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur serveur: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Erreur lors de la création')->withInput();
        }
    }

    public function edit($id)
    {
        try {
            Log::info("Chargement formation pour édition - ID: $id");
            
            $formation = Formation::with('categorie')->findOrFail($id);
            
            Log::info("Formation trouvée:", $formation->toArray());

            return response()->json([
                'success' => true,
                'formation' => $formation
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement de la formation: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Formation non trouvée.'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            Log::info("=== DÉBUT MODIFICATION FORMATION ===");
            Log::info("Formation ID: $id");
            Log::info("Méthode HTTP: " . $request->method());
            Log::info("Method spoofing _method: " . $request->input('_method', 'non défini'));
            Log::info("Toutes les données reçues:", $request->all());
            Log::info("Fichiers reçus:", $request->allFiles());
            
            $formation = Formation::findOrFail($id);
            
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'categorie_id' => 'required|exists:categories,id',
                'programme' => 'nullable|string',
                'cout' => 'nullable|numeric',
                'prerequis' => 'nullable|string',
                'bonus' => 'nullable|string',
                'lieu' => 'nullable|string|max:255',
                'date_debut' => [
                    'nullable',
                    'date',
                    'after_or_equal:today'  // Ne peut pas être antérieure à aujourd'hui
                ],
                'date_fin' => [
                    'nullable',
                    'date',
                    'after_or_equal:date_debut'  // Ne peut pas être antérieure à date_debut
                ],
                'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mov,wmv|max:153600',
            ], [
                // Messages d'erreur personnalisés
                'date_debut.after_or_equal' => 'La date de début ne peut pas être antérieure à aujourd\'hui.',
                'date_fin.after_or_equal' => 'La date de fin doit être postérieure ou égale à la date de début.',
            ]);

            Log::info("Validation réussie:", $validated);

            // Gérer l'upload du nouveau fichier
            if ($request->hasFile('file')) {
                Log::info("Nouveau fichier détecté");
                
                // Supprimer l'ancien fichier
                if ($formation->file_path) {
                    Storage::disk('public')->delete($formation->file_path);
                    Log::info("Ancien fichier supprimé: " . $formation->file_path);
                }
                
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('formations', $fileName, 'public');
                
                $mimeType = $file->getMimeType();
                $fileType = str_starts_with($mimeType, 'image/') ? 'image' : 'video';
                
                $validated['file_path'] = $filePath;
                $validated['file_type'] = $fileType;
                
                Log::info("Nouveau fichier sauvegardé: $filePath");
            }

            unset($validated['file']);
            $formation->update($validated);
            $formation->load('categorie');

            Log::info("Formation mise à jour avec succès");
            Log::info("=== FIN MODIFICATION FORMATION ===");

            return response()->json([
                'success' => true,
                'message' => 'Formation modifiée avec succès !',
                'data' => $formation
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("Erreur de validation:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Erreur modification formation: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $formation = Formation::findOrFail($id);

            // Supprimer le fichier
            if ($formation->file_path) {
                Storage::disk('public')->delete($formation->file_path);
            }
            
            $formation->delete();

            return response()->json([
                'success' => true,
                'message' => 'Formation supprimée avec succès !'
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur suppression formation: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression.'
            ], 500);
        }
    }

    public function participer(Request $request)
    {
        try {
            Log::info("=== DÉBUT INSCRIPTION FORMATION ===");
            Log::info("Données reçues:", $request->all());
            
            $validated = $request->validate([
                'formation_id' => 'required|exists:formations,id',
                'nom' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'nullable|string|max:20',
                'message' => 'nullable|string|max:1000',
            ], [
                'formation_id.required' => 'Formation non trouvée',
                'formation_id.exists' => 'Cette formation n\'existe pas',
                'nom.required' => 'Le nom est obligatoire',
                'email.required' => 'L\'email est obligatoire',
                'email.email' => 'L\'email doit être valide',
            ]);

            // Vérifier si l'utilisateur ne s'est pas déjà inscrit (avec le modèle)
            $existingInscription = InscriptionFormation::where('formation_id', $validated['formation_id'])
                ->where('email', $validated['email'])
                ->first();

            if ($existingInscription) {
                Log::warning("Tentative de double inscription", [
                    'email' => $validated['email'],
                    'formation_id' => $validated['formation_id']
                ]);
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Vous êtes déjà inscrit à cette formation avec cet email.'
                    ], 422);
                }
                return back()->with('error', 'Vous êtes déjà inscrit à cette formation.');
            }

            // Créer l'inscription avec le modèle Eloquent
            $inscription = InscriptionFormation::create([
                'formation_id' => $validated['formation_id'],
                'nom' => $validated['nom'],
                'email' => $validated['email'],
                'telephone' => $validated['telephone'],
                'message' => $validated['message'],
                'statut' => 'en_attente',
            ]);

            Log::info("Inscription créée avec succès", [
                'inscription_id' => $inscription->id,
                'formation_id' => $inscription->formation_id,
                'email' => $inscription->email
            ]);

            // Charger les relations pour avoir plus d'infos
            $inscription->load('formation');
            
            Log::info("=== FIN INSCRIPTION FORMATION ===", [
                'inscription' => $inscription->toArray()
            ]);

            // Réponse JSON pour AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Votre demande d\'inscription a été envoyée avec succès ! Nous vous recontacterons rapidement.',
                    'inscription' => [
                        'id' => $inscription->id,
                        'formation_titre' => $inscription->formation->titre,
                        'nom' => $inscription->nom,
                        'email' => $inscription->email,
                        'statut' => $inscription->statut
                    ]
                ]);
            }

            return back()->with('success', 'Votre demande d\'inscription a été envoyée avec succès !');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Erreur validation inscription:', $e->errors());
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation',
                    'errors' => $e->errors()
                ], 422);
            }

            return back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            Log::error('Erreur inscription formation:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur serveur: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Erreur lors de l\'inscription: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Récupérer les détails d'une formation avec ses inscriptions
     */
    public function getDetails($id)
    {
        try {
            $formation = Formation::with(['categorie', 'inscriptions' => function($query) {
                $query->orderBy('created_at', 'desc');
            }])->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'formation' => $formation,
                'inscriptions' => $formation->inscriptions
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur récupération détails formation:', [
                'formation_id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des détails'
            ], 500);
        }
    }

    /**
     * Changer le statut d'une inscription
     */
    public function changerStatutInscription(Request $request, $inscriptionId)
    {
        try {
            $validated = $request->validate([
                'statut' => 'required|in:en_attente,confirme,refuse'
            ]);
            
            $inscription = InscriptionFormation::findOrFail($inscriptionId);
            $inscription->update(['statut' => $validated['statut']]);
            
            Log::info('Statut inscription modifié:', [
                'inscription_id' => $inscriptionId,
                'ancien_statut' => $inscription->getOriginal('statut'),
                'nouveau_statut' => $validated['statut'],
                'formation_id' => $inscription->formation_id
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Statut mis à jour avec succès',
                'formation_id' => $inscription->formation_id
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur changement statut inscription:', [
                'inscription_id' => $inscriptionId,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour'
            ], 500);
        }
    }

    /**
     * Exporter les inscriptions d'une formation en Excel
     */
    public function exportInscriptions($formationId)
    {
        try {
            $formation = Formation::with('inscriptions')->findOrFail($formationId);
            
            // En-têtes pour l'export CSV
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="inscriptions_' . Str::slug($formation->titre) . '_' . date('Y-m-d') . '.csv"',
            ];
            
            $callback = function() use ($formation) {
                $file = fopen('php://output', 'w');
                
                // En-têtes du CSV
                fputcsv($file, [
                    'Formation',
                    'Nom complet',
                    'Email',
                    'Téléphone',
                    'Message',
                    'Statut',
                    'Date inscription'
                ]);
                
                // Données
                foreach ($formation->inscriptions as $inscription) {
                    fputcsv($file, [
                        $formation->titre,
                        $inscription->nom,
                        $inscription->email,
                        $inscription->telephone ?: 'Non renseigné',
                        $inscription->message ?: 'Aucun message',
                        ucfirst(str_replace('_', ' ', $inscription->statut)),
                        $inscription->created_at->format('d/m/Y H:i')
                    ]);
                }
                
                fclose($file);
            };
            
            return Response::stream($callback, 200, $headers);
            
        } catch (\Exception $e) {
            Log::error('Erreur export inscriptions:', [
                'formation_id' => $formationId,
                'error' => $e->getMessage()
            ]);
            
            return back()->with('error', 'Erreur lors de l\'export');
        }
    }
}