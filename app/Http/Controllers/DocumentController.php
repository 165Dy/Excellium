<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Formation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\InscriptionFormation;

class DocumentController extends Controller
{
    /**
     * Afficher tous les documents d'une formation
     * Accessible uniquement aux utilisateurs inscrits avec statut 'confirme'
     */
    public function index($formationId)
    {
        try {
            $formation = Formation::findOrFail($formationId);
            
            // Vérifier si l'utilisateur est inscrit et confirmé
            $isAuthorized = $this->checkUserAccess($formationId);
            
            if (!$isAuthorized) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vous devez être inscrit et confirmé pour accéder aux documents de cette formation.'
                ], 403);
            }
            
            $documents = $formation->documents;
            
            return response()->json([
                'success' => true,
                'documents' => $documents,
                'formation' => $formation
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur récupération documents:', [
                'formation_id' => $formationId,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des documents'
            ], 500);
        }
    }

    /**
     * Créer un nouveau document pour une formation (Admin uniquement)
     */
    public function store(Request $request)
    {
        try {
            Log::info("=== DÉBUT CRÉATION DOCUMENT ===");
            Log::info("📦 Toutes les données reçues:", $request->all());
            Log::info("📁 Fichiers reçus:", $request->allFiles());
            Log::info("🔑 Formation ID:", $request->formation_id);
            Log::info("📄 Titre:", $request->titre);
            
            // Validation
            Log::info("🔍 Début validation...");
            $validated = $request->validate([
                'formation_id' => 'nullable|exists:formations,id',
                'article_id' => 'nullable|exists:articles,id',
                'titre' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'fichier' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:51200', // 50MB max
            ], [
                'formation_id.exists' => 'Cette formation n\'existe pas',
                'article_id.exists' => 'Cet article n\'existe pas',
                'fichier.required' => 'Le fichier est obligatoire',
                'fichier.mimes' => 'Format de fichier non supporté',
                'fichier.max' => 'Le fichier ne doit pas dépasser 50MB',
            ]);
            
            Log::info("✅ Validation réussie!");
            Log::info("📋 Données validées:", $validated);

            // Gérer l'upload du fichier
            if ($request->hasFile('fichier')) {
                Log::info("📤 Fichier détecté pour upload");
                
                $file = $request->file('fichier');
                Log::info("📝 Nom du fichier:", ['nom' => $file->getClientOriginalName(), 'taille' => $file->getSize(), 'mime' => $file->getMimeType()]);
                
                $fileName = time() . '_' . $file->getClientOriginalName();
                Log::info("💾 Nom du fichier généré: " . $fileName);
                
                $filePath = $file->storeAs('documents', $fileName, 'public');
                Log::info("✅ Fichier sauvegardé: " . $filePath);
                
                $validated['fichier'] = $filePath;
            } else {
                Log::error("❌ Aucun fichier détecté !");
            }

            Log::info("💽 Création du document en base de données...");
            Log::info("📊 Données à insérer:", $validated);
            
            $document = Document::create($validated);
            Log::info("✅ Document créé en base - ID: " . $document->id);
            
            $document->load('formation', 'article');
            Log::info("✅ Relations chargées");

            Log::info("=== FIN CRÉATION DOCUMENT (SUCCESS) ===");

            return response()->json([
                'success' => true,
                'message' => 'Document créé avec succès !',
                'document' => $document
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("⚠️ Erreur de validation document:");
            Log::warning("Erreurs:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('❌ ERREUR CRÉATION DOCUMENT');
            Log::error('Message: ' . $e->getMessage());
            Log::error('Fichier: ' . $e->getFile() . ' (ligne ' . $e->getLine() . ')');
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Télécharger un document
     * Accessible uniquement aux utilisateurs inscrits avec statut 'confirme'
     */
    public function download($id)
    {
        try {
            $document = Document::findOrFail($id);
            
            // Si c'est un document de formation, vérifier les permissions
            if ($document->formation_id) {
                $isAuthorized = $this->checkUserAccess($document->formation_id);
                
                if (!$isAuthorized) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Vous devez être inscrit et confirmé pour télécharger ce document.'
                    ], 403);
                }
            }
            
            $filePath = storage_path('app/public/' . $document->fichier);
            
            if (!file_exists($filePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fichier non trouvé'
                ], 404);
            }
            
            return response()->download($filePath);
            
        } catch (\Exception $e) {
            Log::error('Erreur téléchargement document: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du téléchargement.'
            ], 500);
        }
    }

    /**
     * Afficher un document spécifique
     */
    public function show($id)
    {
        try {
            Log::info("=== RÉCUPÉRATION DOCUMENT ===");
            Log::info("Document ID: $id");
            
            $document = Document::with('formation', 'article')->findOrFail($id);
            Log::info("✅ Document trouvé:", $document->toArray());
            
            // Si c'est un document de formation, vérifier les permissions
            if ($document->formation_id) {
                $isAuthorized = $this->checkUserAccess($document->formation_id);
                
                if (!$isAuthorized) {
                    Log::warning("⚠️ Accès refusé au document pour l'utilisateur");
                    return response()->json([
                        'success' => false,
                        'message' => 'Vous devez être inscrit et confirmé pour voir ce document.'
                    ], 403);
                }
            }
            
            return response()->json([
                'success' => true,
                'document' => $document
            ]);

        } catch (\Exception $e) {
            Log::error('❌ Erreur lors du chargement du document:', [
                'id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Document non trouvé.'
            ], 404);
        }
    }

    /**
     * Mettre à jour un document (Admin uniquement)
     */
    public function update(Request $request, $id)
    {
        try {
            Log::info("=== DÉBUT MODIFICATION DOCUMENT ===");
            Log::info("Document ID: $id");
            Log::info("📦 Toutes les données reçues:", $request->all());
            Log::info("📁 Fichiers reçus:", $request->allFiles());
            
            Log::info("🔍 Recherche du document...");
            $document = Document::findOrFail($id);
            Log::info("✅ Document trouvé:", $document->toArray());
            
            Log::info("🔍 Début validation...");
            $validated = $request->validate([
                'titre' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'fichier' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:51200',
            ]);
            
            Log::info("✅ Validation réussie!");
            Log::info("📋 Données validées:", $validated);

            // Gérer l'upload du nouveau fichier
            if ($request->hasFile('fichier')) {
                Log::info("📤 Nouveau fichier détecté");
                
                // Supprimer l'ancien fichier
                if ($document->fichier) {
                    Storage::disk('public')->delete($document->fichier);
                    Log::info("🗑️ Ancien fichier supprimé");
                }
                
                $file = $request->file('fichier');
                Log::info("📝 Nom du fichier:", ['nom' => $file->getClientOriginalName(), 'taille' => $file->getSize()]);
                
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $fileName, 'public');
                Log::info("✅ Nouveau fichier sauvegardé: " . $filePath);
                
                $validated['fichier'] = $filePath;
            } else {
                Log::info("ℹ️ Aucun nouveau fichier fourni");
            }

            Log::info("💽 Mise à jour du document...");
            $document->update($validated);
            Log::info("✅ Document mis à jour en base");
            
            $document->load('formation', 'article');
            Log::info("✅ Relations chargées");

            Log::info("=== FIN MODIFICATION DOCUMENT (SUCCESS) ===");

            return response()->json([
                'success' => true,
                'message' => 'Document modifié avec succès !',
                'document' => $document
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("⚠️ Erreur de validation:");
            Log::warning("Erreurs:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('❌ ERREUR MODIFICATION DOCUMENT');
            Log::error('Message: ' . $e->getMessage());
            Log::error('Fichier: ' . $e->getFile() . ' (ligne ' . $e->getLine() . ')');
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Supprimer un document (Admin uniquement)
     */
    public function destroy($id)
    {
        try {
            Log::info("=== DÉBUT SUPPRESSION DOCUMENT ===");
            Log::info("Document ID: $id");
            
            $document = Document::findOrFail($id);
            Log::info("✅ Document trouvé:", $document->toArray());
            
            // Supprimer le fichier
            if ($document->fichier) {
                Storage::disk('public')->delete($document->fichier);
                Log::info("🗑️ Fichier supprimé: " . $document->fichier);
            }
            
            $document->delete();
            Log::info("✅ Document supprimé avec succès de la base de données");
            
            Log::info("=== FIN SUPPRESSION DOCUMENT (SUCCESS) ===");

            return response()->json([
                'success' => true,
                'message' => 'Document supprimé avec succès !'
            ]);

        } catch (\Exception $e) {
            Log::error('❌ ERREUR SUPPRESSION DOCUMENT');
            Log::error('Message: ' . $e->getMessage());
            Log::error('Fichier: ' . $e->getFile() . ' (ligne ' . $e->getLine() . ')');
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression.'
            ], 500);
        }
    }

    /**
     * Vérifier si l'utilisateur a accès à une formation
     * (inscrit avec statut 'confirme')
     */
    private function checkUserAccess($formationId)
    {
        // Si l'utilisateur n'est pas connecté
        if (!Auth::check()) {
            return false;
        }

        $user = Auth::user();
        
        // Vérifier si l'utilisateur est admin (peut tout voir)
        if (isset($user->role) && $user->role === 'admin') {
            return true;
        }

        // Vérifier si l'utilisateur est inscrit avec statut 'confirme'
        $inscription = InscriptionFormation::where('formation_id', $formationId)
            ->where('email', $user->email)
            ->where('statut', 'confirme')
            ->first();

        return $inscription !== null;
    }

    /**
     * Liste tous les documents d'une formation pour l'admin
     */
    public function adminIndex($formationId)
    {
        try {
            $formation = Formation::with('documents')->findOrFail($formationId);
            
            return response()->json([
                'success' => true,
                'documents' => $formation->documents,
                'formation' => $formation
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur récupération documents admin:', [
                'formation_id' => $formationId,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des documents'
            ], 500);
        }
    }
}

