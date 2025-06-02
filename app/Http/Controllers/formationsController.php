<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;  
use Illuminate\Support\Facades\Log;    

class formationsController extends Controller
{
    public function index_public(Request $request)
    {
        $categories = Categorie::all();

        // Si une catégorie est sélectionnée, filtre les formations
        if ($request->has('categorie_id')) {
            $formations = Formation::with('categorie')
                ->where('categorie_id', $request->categorie_id)
                ->latest()->get();
        } else {
            $formations = Formation::with('categorie')->latest()->get();
        }

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
}