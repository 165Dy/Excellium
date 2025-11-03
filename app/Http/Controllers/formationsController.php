<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Categorie;
use App\Models\Module;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;  
use Illuminate\Support\Facades\Log;    
use Illuminate\Support\Facades\DB;
use App\Models\InscriptionFormation;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use \Mailgun\Mailgun;
use App\Models\User;
use App\Services\SuperAdminNotificationService;

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

            // Gérer les modules si présents
            if ($request->has('modules') && $request->modules) {
                $modules = json_decode($request->modules, true);
                if (is_array($modules) && count($modules) > 0) {
                    foreach ($modules as $moduleData) {
                        $formation->modules()->create([
                            'titre' => $moduleData['titre'],
                            'description' => $moduleData['description'] ?? null,
                        ]);
                    }
                    Log::info("Modules créés: " . count($modules));
                }
            }

            // Gérer les documents si présents
            if ($request->has('documents') && $request->documents) {
                Log::info("🔍 DEBUG DOCUMENTS - Début du traitement");
                $documents = json_decode($request->documents, true);
                Log::info("🔍 DEBUG DOCUMENTS - Données JSON décodées:", ['documents' => $documents]);
                
                if (is_array($documents) && count($documents) > 0) {
                    Log::info("🔍 DEBUG DOCUMENTS - Nombre de documents à traiter: " . count($documents));
                    
                    foreach ($documents as $index => $documentData) {
                        Log::info("🔍 DEBUG DOCUMENT #$index - Données complètes:", $documentData);
                        Log::info("🔍 DEBUG DOCUMENT #$index - Vérification 'fichier':", [
                            'isset_fichier' => isset($documentData['fichier']),
                            'isset_fichier_nom' => isset($documentData['fichier_nom']),
                            'valeur_fichier' => $documentData['fichier'] ?? 'non défini',
                            'valeur_fichier_nom' => $documentData['fichier_nom'] ?? 'non défini'
                        ]);
                        
                        // Vérifier si fichier_nom est présent (c'est le champ envoyé par le front)
                        if (isset($documentData['fichier_nom']) && !empty($documentData['fichier_nom'])) {
                            Log::info("✅ DEBUG DOCUMENT #$index - Création du document avec fichier_nom");
                            
                            $document = $formation->documents()->create([
                                'titre' => $documentData['titre'] ?? 'Document de formation',
                                'description' => $documentData['description'] ?? null,
                                'fichier' => $documentData['fichier_nom'], // Utiliser fichier_nom
                            ]);
                            
                            Log::info("✅ DEBUG DOCUMENT #$index - Document créé avec succès, ID: " . $document->id);
                        } else {
                            Log::warning("⚠️ DEBUG DOCUMENT #$index - Aucun fichier_nom fourni, document non créé");
                        }
                    }
                    Log::info("🔍 DEBUG DOCUMENTS - Traitement terminé");
                } else {
                    Log::warning("⚠️ DEBUG DOCUMENTS - Le tableau documents est vide ou invalide");
                }
            } else {
                Log::info("ℹ️ DEBUG DOCUMENTS - Aucun document fourni dans la requête");
            }

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
            return redirect()->route('admin.dashboard')->with('success', 'Formation créée avec succès !');

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

    /**
     * Afficher la page de détails complète d'une formation (pour l'admin)
     */
    public function details($id)
    {
        try {
            Log::info("=== CHARGEMENT PAGE DÉTAILS FORMATION ===");
            Log::info("Formation ID: $id");
            
            $formation = Formation::with([
                'categorie',
                'modules' => function($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'documents' => function($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'inscriptions' => function($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'users' => function($query) {
                    $query->orderBy('formation_user.created_at', 'desc');
                }
            ])->findOrFail($id);
            
            $categories = Categorie::all();
            
            Log::info("Formation trouvée avec succès");
            Log::info("Modules: " . $formation->modules->count());
            Log::info("Documents: " . $formation->documents->count());
            Log::info("Inscriptions: " . $formation->inscriptions->count());
            Log::info("Utilisateurs liés: " . $formation->users->count());

            return view('Admin.formations.details', compact('formation', 'categories'));

        } catch (\Exception $e) {
            Log::error('Erreur chargement détails formation: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return redirect()->route('admin.dashboard')
                ->with('error', 'Formation non trouvée.');
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

            // Vérifier si l'utilisateur ne s'est pas déjà inscrit
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
            
            // ✅ CRÉER LA NOTIFICATION
            \App\Models\Notification::createFormationInscription($inscription, $inscription->formation);
            
            // ✅ ENVOYER EMAIL AUX SUPER_ADMIN
            try {
                $emailData = SuperAdminNotificationService::prepareFormationInscriptionData($inscription, $inscription->formation);
                SuperAdminNotificationService::sendNotification($emailData);
                Log::info("Email envoyé aux super_admin pour inscription formation");
            } catch (\Exception $e) {
                Log::error("Erreur envoi email super_admin (inscription formation): " . $e->getMessage());
            }
            
            Log::info("=== FIN INSCRIPTION FORMATION ===", [
                'inscription' => $inscription->toArray()
            ]);

            // Tenter d'envoyer l'email de confirmation (non bloquant)
            try {
                // Préparer les variables pour le template Mailgun
                $variables = [
                    'name' => $inscription->nom,
                    'formation' => $inscription->formation->titre,
                    'date' => $inscription->formation->date_debut ? \Carbon\Carbon::parse($inscription->formation->date_debut)->format('d/m/Y') : 'À définir',
                    'lieu' => $inscription->formation->lieu ?? 'À définir',
                    'cout' => $inscription->formation->cout ?? 'À définir',
                ];

                // Envoi du mail via Mailgun
                $mailgunSecret = config('services.mailgun.secret');
                $mailgunDomain = config('services.mailgun.domain');
                $mailgunEndpoint = config('services.mailgun.endpoint', 'api.eu.mailgun.net');
                
                if (!empty($mailgunSecret) && !empty($mailgunDomain)) {
                    $mg = Mailgun::create($mailgunSecret, 'https://' . $mailgunEndpoint);
                    $mg->messages()->send($mailgunDomain, [
                        'from' => 'contact@excelliumconseils.com',
                        'to' => $inscription->email,
                        'subject' => 'Confirmation de votre inscription à la formation',
                        'template' => 'excellium_formation_welcome',
                        'h:X-Mailgun-Variables' => json_encode($variables),
                    ]);
                } else {
                    Log::warning("Configuration Mailgun manquante - Email de confirmation formation non envoyé");
                }
                
                Log::info("Email de confirmation envoyé avec succès à: " . $inscription->email);
            } catch (\Exception $e) {
                // L'envoi d'email a échoué mais l'inscription est quand même enregistrée
                Log::warning("Échec de l'envoi d'email de confirmation:", [
                    'error' => $e->getMessage(),
                    'inscription_id' => $inscription->id,
                    'email' => $inscription->email
                ]);
                // On continue quand même, l'inscription est valide
            }

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
            $ancienStatut = $inscription->statut;
            $inscription->update(['statut' => $validated['statut']]);
            
            // ✅ CRÉER LA NOTIFICATION DE CHANGEMENT DE STATUT
            \App\Models\Notification::createStatutChange('formation', $inscription, $ancienStatut, $validated['statut']);
            
            // ✅ ENVOYER EMAIL AUX SUPER_ADMIN (si accepté ou refusé)
            if (in_array($validated['statut'], ['accepte', 'refuse'])) {
                try {
                    $inscription->load('formation');
                    $emailData = SuperAdminNotificationService::prepareFormationInscriptionData($inscription, $inscription->formation);
                    $emailData['action_type'] = 'Changement de statut inscription formation';
                    $emailData['action_description'] = "Le statut d'une inscription est passé de '{$ancienStatut}' à '{$validated['statut']}'";
                    $emailData['alert_type'] = $validated['statut'] === 'accepte' ? 'success' : 'danger';
                    SuperAdminNotificationService::sendNotification($emailData);
                    Log::info("Email envoyé aux super_admin pour changement statut");
                } catch (\Exception $e) {
                    Log::error("Erreur envoi email super_admin (changement statut): " . $e->getMessage());
                }
            }
            
            Log::info('Statut inscription modifié:', [
                'inscription_id' => $inscriptionId,
                'ancien_statut' => $ancienStatut,
                'nouveau_statut' => $validated['statut'],
                'formation_id' => $inscription->formation_id
            ]);
            
            // Si le statut passe à "confirme", créer un compte utilisateur
            if ($validated['statut'] === 'confirme' && $ancienStatut !== 'confirme') {
                $this->creerCompteParticipant($inscription);
            }
            
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
     * Créer un compte utilisateur pour un participant à une formation
     * Note: L'utilisateur est enregistré dans le système mais n'a pas d'accès de connexion
     */
    private function creerCompteParticipant(InscriptionFormation $inscription)
    {
        try {
            // Vérifier si l'utilisateur existe déjà par email OU téléphone
            $existingUser = User::where('email', $inscription->email)
                ->orWhere('telephone', $inscription->telephone)
                ->first();
            
            if ($existingUser) {
                Log::info("L'utilisateur existe déjà, liaison à la formation", [
                    'user_id' => $existingUser->id,
                    'email' => $inscription->email,
                    'formation_id' => $inscription->formation_id
                ]);
                
                // Lier l'utilisateur existant à la formation s'il ne l'est pas déjà
                $formation = Formation::findOrFail($inscription->formation_id);
                if (!$formation->users()->where('user_id', $existingUser->id)->exists()) {
                    $formation->users()->attach($existingUser->id, [
                        'message' => $inscription->message,
                        'statut' => 'confirme'
                    ]);
                }
                
                // Mettre à jour l'inscription avec le user_id
                $inscription->update(['user_id' => $existingUser->id]);
                
                return $existingUser;
            }
            
            // Séparer le nom complet en nom et prénom
            $nomComplet = trim($inscription->nom);
            $partiesNom = explode(' ', $nomComplet, 2);
            
            $prenom = $partiesNom[0] ?? '';
            $nom = $partiesNom[1] ?? $partiesNom[0]; // Si pas de prénom, tout est considéré comme nom
            
            // Créer l'utilisateur SANS mot de passe (réservé aux admins uniquement)
            $user = User::create([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $inscription->email,
                'telephone' => $inscription->telephone,
                'password' => null,
                'type' => 'participant_formation',
                'email_verified_at' => null,
            ]);
            
            Log::info("Participant enregistré dans le système (sans accès de connexion)", [
                'user_id' => $user->id,
                'email' => $user->email,
                'type' => $user->type,
                'formation_id' => $inscription->formation_id
            ]);
            
            // Lier l'utilisateur à la formation via la table pivot
            $formation = Formation::findOrFail($inscription->formation_id);
            $formation->users()->attach($user->id, [
                'message' => $inscription->message,
                'statut' => 'confirme'
            ]);
            
            // Mettre à jour l'inscription avec le user_id
            $inscription->update(['user_id' => $user->id]);
            
            return $user;
            
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du compte participant:', [
                'inscription_id' => $inscription->id,
                'email' => $inscription->email,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Ne pas bloquer le changement de statut si la création du compte échoue
            return null;
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

    /**
     * Récupérer tous les modules de toutes les formations
     */
    public function getAllModules()
    {
        try {
            Log::info("=== CHARGEMENT TOUS LES MODULES ===");
            
            $modules = Module::with('formation')->orderBy('created_at', 'desc')->get();
            
            Log::info("Modules trouvés: " . $modules->count());
            
            return response()->json([
                'success' => true,
                'modules' => $modules
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur récupération tous les modules:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des modules'
            ], 500);
        }
    }

    /**
     * Récupérer tous les documents de toutes les formations
     */
    public function getAllDocuments()
    {
        try {
            Log::info("=== CHARGEMENT TOUS LES DOCUMENTS ===");
            
            $documents = Document::with('formation')
                ->whereNotNull('formation_id') // Uniquement les documents liés à des formations
                ->orderBy('created_at', 'desc')
                ->get();
            
            Log::info("Documents trouvés: " . $documents->count());
            
            return response()->json([
                'success' => true,
                'documents' => $documents
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur récupération tous les documents:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des documents'
            ], 500);
        }
    }
}