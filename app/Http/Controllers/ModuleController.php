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
            Log::info("=== CRÉATION MODULE ===");
            Log::info("Données reçues:", $request->all());
            
            $validated = $request->validate([
                'formation_id' => 'required|exists:formations,id',
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
            ], [
                'formation_id.required' => 'La formation est obligatoire',
                'formation_id.exists' => 'Cette formation n\'existe pas',
                'titre.required' => 'Le titre du module est obligatoire',
            ]);

            $module = Module::create($validated);
            $module->load('formation');

            Log::info("Module créé avec succès - ID: " . $module->id);

            return response()->json([
                'success' => true,
                'message' => 'Module créé avec succès !',
                'module' => $module
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("Erreur de validation module:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Erreur création module: ' . $e->getMessage());
            
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
            $module = Module::with('formation')->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'module' => $module
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur lors du chargement du module: ' . $e->getMessage());
            
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
            Log::info("=== MODIFICATION MODULE ===");
            Log::info("Module ID: $id");
            Log::info("Données reçues:", $request->all());
            
            $module = Module::findOrFail($id);
            
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
            ], [
                'titre.required' => 'Le titre du module est obligatoire',
            ]);

            $module->update($validated);
            $module->load('formation');

            Log::info("Module mis à jour avec succès");

            return response()->json([
                'success' => true,
                'message' => 'Module modifié avec succès !',
                'module' => $module
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning("Erreur de validation:", $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Erreur modification module: ' . $e->getMessage());
            
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
            $module = Module::findOrFail($id);
            $module->delete();

            return response()->json([
                'success' => true,
                'message' => 'Module supprimé avec succès !'
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur suppression module: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression.'
            ], 500);
        }
    }
}
