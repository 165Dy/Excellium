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

    public function store(Request $request)
    {
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
        ]);

        Formation::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Formation créée avec succès !'
        ]);
    }

    public function show($id)
    {
        return view('Admin.Formations.show', compact('id'));
    }

    public function edit($id)
    {
        return view('Admin.Formations.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // logiquement ici tu traites la mise à jour
        return redirect()->route('formations.index');
    }

    public function destroy($id)
    {
        // logiquement ici tu supprimes l'élément
        return redirect()->route('formations.index');
    }
}