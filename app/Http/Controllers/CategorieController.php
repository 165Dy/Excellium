<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('layouts.admin', compact('categories'));
    }

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
    
}
