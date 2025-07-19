<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Créer un produit
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:produits',
            'categorie_id' => 'required|exists:categories,id',
            'statut' => 'required|in:actif,inactif'
        ]);

        $produit = Produit::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produit créé avec succès !',
            'produit' => $produit
        ]);
    }

    // Liste AJAX
    public function list()
    {
        $produits = Produit::with('categorie')
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($produit) {
                return [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'description' => $produit->description,
                    'categorie' => $produit->categorie ? $produit->categorie->nom : 'Non défini',
                    'statut' => $produit->statut,
                    'statut_label' => ucfirst($produit->statut),
                    'statut_color' => $produit->statut === 'actif' ? 'success' : 'danger',
                    'actions' => view('admin.produits.partials.actions', compact('produit'))->render()
                ];
            });

        return response()->json(['data' => $produits]);
    }

    // Modifier
    public function update(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:produits,slug,' . $produit->id
            ],
            'categorie_id' => 'required|exists:categories,id',
            'statut' => 'required|in:actif,inactif'
        ]);

        $produit->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produit modifié avec succès !',
            'produit' => $produit->fresh()
        ]);
    }

    // Supprimer
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $nom = $produit->nom;
        $produit->delete();

        return response()->json([
            'success' => true,
            'message' => "Le produit '{$nom}' a été supprimé avec succès !"
        ]);
    }

    public function show($id)
    {
        return Produit::findOrFail($id);
    }
}