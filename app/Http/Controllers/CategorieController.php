<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    // Créer une catégorie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
        ]);
        
        Categorie::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Catégorie créée avec succès !'
        ]);
    }
    
    // Retourner la liste des catégories (AJAX)
    public function list()
    {
        $categories = Categorie::orderBy('id', 'desc')->get();
        return response()->json($categories);
    }

    // Mettre à jour une catégorie
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
        ]);
        $categorie = Categorie::findOrFail($id);
        $categorie->update($validated);

        return response()->json(['success' => true, 'message' => 'Catégorie modifiée avec succès !']);
    }

    // Supprimer une catégorie
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return response()->json(['success' => true, 'message' => 'Catégorie supprimée avec succès !']);
    }
}
