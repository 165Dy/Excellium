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
            Log::info("=== CRÉATION DOCUMENT ===");
            Log::info("Données reçues:", $request->all());
            
            $validated = $request->validate([
                'formation_id' => 'nullable|exists:formations,id',
                'article_id' => 'nullable|exists:articles,id',
                'titre' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'type' => 'required|in:formation,article,autre',
                'fichier' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:51200', // 50MB max
            ], [
                'formation_id.exists' => 'Cette formation n\'existe pas',
                'article_id.exists' => 'Cet article n\'existe pas',
                'type.required' => 'Le type de document est obligatoire',
                'fichier.required' => 'Le fichier est obligatoire',
                'fichier.mimes' => 'Format de fichier non supporté',
                'fichier.max' => 'Le fichier ne doit pas dépasser 50MB',
            ]);

            // Gérer l'upload du fichier
            if ($request->hasFile('fichier')) {
                $file = $request->file('fichier');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $fileName, 'public');
                
                $validated['fichier'] = $filePath;
            }

            $document = Document::create($validated);
            $document->load('formation', 'article');

            Log::info("Document créé avec succès - ID: " . $document->id);

            return response()->json([
                'success' => true,
                'message' => 'Document créé avec succès !',
                'document' => $document
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("Erreur de validation document:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Erreur création document: ' . $e->getMessage());
            
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
            if ($document->type === 'formation' && $document->formation_id) {
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
            $document = Document::with('formation', 'article')->findOrFail($id);
            
            // Si c'est un document de formation, vérifier les permissions
            if ($document->type === 'formation' && $document->formation_id) {
                $isAuthorized = $this->checkUserAccess($document->formation_id);
                
                if (!$isAuthorized) {
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
            Log::error('Erreur lors du chargement du document: ' . $e->getMessage());
            
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
            Log::info("=== MODIFICATION DOCUMENT ===");
            Log::info("Document ID: $id");
            Log::info("Données reçues:", $request->all());
            
            $document = Document::findOrFail($id);
            
            $validated = $request->validate([
                'titre' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'type' => 'required|in:formation,article,autre',
                'fichier' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:51200',
            ]);

            // Gérer l'upload du nouveau fichier
            if ($request->hasFile('fichier')) {
                // Supprimer l'ancien fichier
                if ($document->fichier) {
                    Storage::disk('public')->delete($document->fichier);
                }
                
                $file = $request->file('fichier');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $fileName, 'public');
                
                $validated['fichier'] = $filePath;
            }

            $document->update($validated);
            $document->load('formation', 'article');

            Log::info("Document mis à jour avec succès");

            return response()->json([
                'success' => true,
                'message' => 'Document modifié avec succès !',
                'document' => $document
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("Erreur de validation:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Erreur modification document: ' . $e->getMessage());
            
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
            $document = Document::findOrFail($id);
            
            // Supprimer le fichier
            if ($document->fichier) {
                Storage::disk('public')->delete($document->fichier);
            }
            
            $document->delete();

            return response()->json([
                'success' => true,
                'message' => 'Document supprimé avec succès !'
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur suppression document: ' . $e->getMessage());
            
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

