<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\UserProduit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Services\SuperAdminNotificationService;

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

    /**
     * Sélection d'un produit par un utilisateur (inscription)
     */
    public function selectionner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'telephone' => 'nullable|string|max:20',
            'produit_id' => 'required|exists:produits,id',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation: ' . implode(' ', $validator->errors()->all())
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Vérifier si l'utilisateur existe déjà par email OU téléphone
            $user = User::where('email', $request->email)
                        ->orWhere('telephone', $request->telephone)
                        ->first();
            
            if (!$user) {
                // Créer un nouvel utilisateur (sans mot de passe - réservé aux admins)
                $user = User::create([
                    'email' => $request->email,
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'telephone' => $request->telephone,
                    'type' => 'participant_produit',
                    'password' => null
                ]);
            }

            // Récupérer le produit
            $produit = Produit::findOrFail($request->produit_id);

            // Vérifier si l'utilisateur n'a pas déjà sélectionné ce produit
            $existingSelection = UserProduit::where('user_id', $user->id)
                ->where('produit_id', $produit->id)
                ->first();

            if ($existingSelection) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'Vous avez déjà sélectionné ce produit.'
                ], 422);
            }

            // Créer la sélection du produit
            $userProduit = UserProduit::create([
                'user_id' => $user->id,
                'produit_id' => $produit->id,
                'description' => $request->description,
                'statut' => 'en_attente',
            ]);
            
            // ✅ ENVOYER EMAIL AUX SUPER_ADMIN
            try {
                $emailData = SuperAdminNotificationService::prepareProduitSelectionData($userProduit, $produit, $user);
                SuperAdminNotificationService::sendNotification($emailData);
                Log::info("Email envoyé aux super_admin pour nouvelle sélection produit");
            } catch (\Exception $e) {
                Log::error("Erreur envoi email super_admin (sélection produit): " . $e->getMessage());
            }

            DB::commit();

            Log::info('Nouvel utilisateur a sélectionné un produit', [
                'user_id' => $user->id,
                'email' => $user->email,
                'produit_id' => $produit->id,
                'user_produit_id' => $userProduit->id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Produit sélectionné avec succès ! Nous vous contacterons bientôt.'
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Erreur sélection produit: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Liste des sélections Utilisateur-Produit
     */
    public function listUserProduits()
    {
        $items = UserProduit::with(['user', 'produit'])
            ->orderByDesc('id')
            ->get()
            ->map(function (UserProduit $up) {
                $userFullName = trim(($up->user->prenom ?? '') . ' ' . ($up->user->nom ?? ($up->user->name ?? '')));
                
                // Badge de statut
                $statutBadges = [
                    'en_attente' => ['label' => 'En attente', 'color' => 'warning'],
                    'accepte' => ['label' => 'Accepté', 'color' => 'success'],
                    'refuse' => ['label' => 'Refusé', 'color' => 'danger'],
                    'en_cours' => ['label' => 'En cours', 'color' => 'info'],
                    'termine' => ['label' => 'Terminé', 'color' => 'primary'],
                ];
                $statutInfo = $statutBadges[$up->statut ?? 'en_attente'] ?? $statutBadges['en_attente'];
                
                return [
                    'id' => $up->id,
                    'utilisateur' => $userFullName !== '' ? $userFullName : 'Utilisateur',
                    'email' => $up->user->email ?? '',
                    'telephone' => $up->user->telephone ?? '—',
                    'produit' => $up->produit->nom ?? '—',
                    'produit_id' => $up->produit_id,
                    'description' => $up->description ?? '',
                    'statut' => $up->statut ?? 'en_attente',
                    'statut_label' => $statutInfo['label'],
                    'statut_color' => $statutInfo['color'],
                    'date_selection' => $up->created_at ? $up->created_at->format('d/m/Y H:i') : '—',
                    'actions' => view('admin.produits.partials.selection_actions', compact('up'))->render()
                ];
            });

        return response()->json(['data' => $items]);
    }

    /**
     * Mettre à jour le statut d'une sélection
     */
    public function updateSelectionStatut(Request $request, $id)
    {
        try {
            $request->validate([
                'statut' => 'required|in:en_attente,accepte,refuse,en_cours,termine'
            ]);

            $userProduit = UserProduit::findOrFail($id);
            $ancienStatut = $userProduit->statut;
            $userProduit->update(['statut' => $request->statut]);

            Log::info("Statut de sélection produit mis à jour", [
                'user_produit_id' => $id,
                'ancien_statut' => $ancienStatut,
                'nouveau_statut' => $request->statut
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Statut mis à jour avec succès !'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Supprimer une sélection
     */
    public function destroySelection($id)
    {
        try {
            $userProduit = UserProduit::findOrFail($id);
            $userProduit->delete();

            Log::info("Sélection produit supprimée", [
                'user_produit_id' => $id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Sélection supprimée avec succès !'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}