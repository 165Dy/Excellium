<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Exception;

class ProduitController extends Controller
{
    // Créer un produit
    public function store(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:produits,slug',
                'categorie_id' => 'required|exists:categories,id',
                'statut' => 'required|in:actif,inactif',
            ]);

            // Création du produit
            $produit = Produit::create($validated);

            // ✅ Retourner une réponse JSON compatible avec ton JS
            return response()->json([
                'success' => true,
                'message' => 'Produit créé avec succès !',
                'produit' => $produit,
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // ✅ Retourner les erreurs de validation au format JSON
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // ✅ Retourner une erreur générique JSON
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue : ' . $e->getMessage(),
            ], 500);
        }
    }


    // Liste AJAX des produits au niveau admin
    public function list()
    {
        $produits = Produit::with('categorie')
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($produit) {
                return [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'categorie' => $produit->categorie ? $produit->categorie->nom : 'Non défini',
                    'statut' => $produit->statut,
                    'statut_label' => ucfirst($produit->statut),
                    'statut_color' => $produit->statut === 'actif' ? 'success' : 'danger',
                    'actions' => view('admin.produits.partials.actions', compact('produit'))->render()
                ];
            });

        return response()->json(['data' => $produits]);
    }

    //Liste des produits au niveau client
    public function index()
    {
        $produits = Produit::orderBy('id', 'desc')->get();
        return view('welcome', compact('produits'));
    }

    // Modifier
    public function update(Request $request, $id)
    {
        try {
            $produit = Produit::findOrFail($id);

            $validated = $request->validate([
                'nom' => 'required|string|max:255',
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
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Supprimer
    public function destroy($id)
    {
        try {
            $produit = Produit::findOrFail($id);
            $nom = $produit->nom;
            $produit->delete();

            return response()->json([
                'success' => true,
                'message' => "Le produit '{$nom}' a été supprimé avec succès !"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        return Produit::findOrFail($id);
    }
}