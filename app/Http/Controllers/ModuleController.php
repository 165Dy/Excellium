<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Formation;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{
    /**
     * Afficher tous les modules d'une formation
     */
    public function index($formationId)
    {
        try {
            $formation = Formation::with('modules')->findOrFail($formationId);
            
            return response()->json([
                'success' => true,
                'modules' => $formation->modules,
                'formation' => $formation
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erreur récupération modules:', [
                'formation_id' => $formationId,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des modules'
            ], 500);
        }
    }

    /**
     * Créer un nouveau module pour une formation
     */
    public function store(Request $request)
    {
        try {
            Log::info("=== DÉBUT CRÉATION MODULE ===");
            Log::info("📦 Toutes les données reçues:", $request->all());
            Log::info("🔑 Formation ID:", $request->formation_id);
            Log::info("📝 Titre:", $request->titre);
            
            Log::info("🔍 Début validation...");
            $validated = $request->validate([
                'formation_id' => 'required|exists:formations,id',
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
            ], [
                'formation_id.required' => 'La formation est obligatoire',
                'formation_id.exists' => 'Cette formation n\'existe pas',
                'titre.required' => 'Le titre du module est obligatoire',
            ]);
            
            Log::info("✅ Validation réussie!");
            Log::info("📋 Données validées:", $validated);

            Log::info("💽 Création du module en base de données...");
            $module = Module::create($validated);
            Log::info("✅ Module créé en base - ID: " . $module->id);
            
            $module->load('formation');
            Log::info("✅ Relations chargées");

            Log::info("=== FIN CRÉATION MODULE (SUCCESS) ===");

            return response()->json([
                'success' => true,
                'message' => 'Module créé avec succès !',
                'module' => $module
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("⚠️ Erreur de validation module:");
            Log::warning("Erreurs:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('❌ ERREUR CRÉATION MODULE');
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
     * Afficher un module spécifique
     */
    public function show($id)
    {
        try {
            Log::info("=== RÉCUPÉRATION MODULE ===");
            Log::info("Module ID: $id");
            
            $module = Module::with('formation')->findOrFail($id);
            
            Log::info("✅ Module trouvé:", $module->toArray());
            
            return response()->json([
                'success' => true,
                'module' => $module
            ]);

        } catch (\Exception $e) {
            Log::error('❌ Erreur lors du chargement du module:', [
                'id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Module non trouvé.'
            ], 404);
        }
    }

    /**
     * Mettre à jour un module
     */
    public function update(Request $request, $id)
    {
        try {
            Log::info("=== DÉBUT MODIFICATION MODULE ===");
            Log::info("Module ID: $id");
            Log::info("📦 Toutes les données reçues:", $request->all());
            
            Log::info("🔍 Recherche du module...");
            $module = Module::findOrFail($id);
            Log::info("✅ Module trouvé:", $module->toArray());
            
            Log::info("🔍 Début validation...");
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
            ], [
                'titre.required' => 'Le titre du module est obligatoire',
            ]);
            
            Log::info("✅ Validation réussie!");
            Log::info("📋 Données validées:", $validated);

            Log::info("💽 Mise à jour du module...");
            $module->update($validated);
            Log::info("✅ Module mis à jour en base");
            
            $module->load('formation');
            Log::info("✅ Relations chargées");

            Log::info("=== FIN MODIFICATION MODULE (SUCCESS) ===");

            return response()->json([
                'success' => true,
                'message' => 'Module modifié avec succès !',
                'module' => $module
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
            Log::error('❌ ERREUR MODIFICATION MODULE');
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
     * Supprimer un module
     */
    public function destroy($id)
    {
        try {
            Log::info("=== DÉBUT SUPPRESSION MODULE ===");
            Log::info("Module ID: $id");
            
            $module = Module::findOrFail($id);
            Log::info("✅ Module trouvé:", $module->toArray());
            
            $module->delete();
            Log::info("✅ Module supprimé avec succès");
            
            Log::info("=== FIN SUPPRESSION MODULE (SUCCESS) ===");

            return response()->json([
                'success' => true,
                'message' => 'Module supprimé avec succès !'
            ]);

        } catch (\Exception $e) {
            Log::error('❌ ERREUR SUPPRESSION MODULE');
            Log::error('Message: ' . $e->getMessage());
            Log::error('Fichier: ' . $e->getFile() . ' (ligne ' . $e->getLine() . ')');
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression.'
            ], 500);
        }
    }
}
