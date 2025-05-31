<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Categorie;
class formationsController extends Controller
{
    public function index()
    {
        return view('Admin.Formations.index');
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('layouts.admin', compact('categories'));
    }

    public function  store(Request $request)
    {
        try {
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'categorie_id' => 'required|exists:categories,id',
                'programme' => 'nullable|string',
                'description' => 'nullable|string',
                'cout' => 'nullable|numeric',
                'prerequis' => 'nullable|string',
                'bonus' => 'nullable|string',
                'lieu' => 'nullable|string|max:255',
                'date_debut' => 'nullable|date',
                'date_fin' => 'nullable|date|after_or_equal:date_debut',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mov,wmv|max:153600', // 150MB max
            ]);

            // Gérer l'upload du fichier
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('formations', $fileName, 'public');
                
                // Déterminer le type de fichier
                $mimeType = $file->getMimeType();
                $fileType = str_starts_with($mimeType, 'image/') ? 'image' : 'video';
                
                $validated['file_path'] = $filePath;
                $validated['file_type'] = $fileType;
            }

            // Retirer le champ 'file' de validated car il n'existe pas en base
            unset($validated['file']);

            $formation = Formation::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Formation créée avec succès !',
                'data' => $formation
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Erreur création formation: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        return view('Admin.Formations.show', compact('id'));
    }

    public function edit($id)
    {
        try {
            $formation = Formation::with('categorie')->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'formation' => $formation
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Formation non trouvée.'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $formation = Formation::findOrFail($id);
            
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'categorie_id' => 'required|exists:categories,id',
                'programme' => 'nullable|string',
                'cout' => 'nullable|numeric',
                'prerequis' => 'nullable|string',
                'bonus' => 'nullable|string',
                'lieu' => 'nullable|string|max:255',
                'date_debut' => 'nullable|date',
                'date_fin' => 'nullable|date|after_or_equal:date_debut',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mov,wmv|max:153600',
            ]);

            // Gérer l'upload du nouveau fichier
            if ($request->hasFile('file')) {
                // Supprimer l'ancien fichier
                if ($formation->file_path) {
                    \Storage::disk('public')->delete($formation->file_path);
                }
                
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('formations', $fileName, 'public');
                
                $mimeType = $file->getMimeType();
                $fileType = str_starts_with($mimeType, 'image/') ? 'image' : 'video';
                
                $validated['file_path'] = $filePath;
                $validated['file_type'] = $fileType;
            }

            unset($validated['file']);
            $formation->update($validated);
            $formation->load('categorie');

            return response()->json([
                'success' => true,
                'message' => 'Formation modifiée avec succès !',
                'data' => $formation
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Erreur modification formation: ' . $e->getMessage());
            
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
                \Storage::disk('public')->delete($formation->file_path);
            }
            
            $formation->delete();

            return response()->json([
                'success' => true,
                'message' => 'Formation supprimée avec succès !'
            ]);

        } catch (\Exception $e) {
            \Log::error('Erreur suppression formation: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression.'
            ], 500);
        }
    }
}