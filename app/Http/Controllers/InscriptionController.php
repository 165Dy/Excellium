<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use Mailgun\Mailgun;
use App\Models\Produit;
use App\Models\UserProduit;

class InscriptionController extends Controller
{

    public function inscriptionAjax(Request $request)
    {
        // Vérifie si l'email existe déjà
        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'success' => false,
                'email_exists' => true,
                'message' => 'Cet email est déjà enregistré.'
            ]);
        }
    
        // Validation
        $validator = Validator::make($request->all(), [
            'email'     => ['required', 'email'],
            'nom'       => 'required|string|max:50',
            'prenom'    => 'required|string|max:50',
            'telephone' => 'nullable|string|max:20'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Erreur de validation : " . implode(' ', $validator->errors()->all())
            ]);
        }
    
        // Création utilisateur (mot de passe null)
        $user = User::create([
            'email'     => $request->email,
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'telephone' => $request->telephone,
            'type'      => 'participant', // par défaut
            'password'  => null
        ]);
    
        return response()->json(['success' => true]);
    }

    public function saveProduits(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'produits' => 'required|array|min:1'
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        // Enregistre les produits sélectionnés
        foreach ($request->produits as $produitId) {
            UserProduit::firstOrCreate([
                'user_id' => $user->id,
                'produit_id' => $produitId
            ]);
        }

        // Prépare les variables pour le template Mailgun
        $nomsProduits = Produit::whereIn('id', $request->produits)->pluck('nom')->toArray();
        $variables = [
            'name' => $user->prenom . ' ' . $user->nom,
            'produits' => $nomsProduits,
            'message' => "Notre équipe reviendra vers vous pour plus d'informations sur les produits sélectionnés."
        ];

        $mg = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.eu.mailgun.net');
        $mg->messages()->send(env('MAILGUN_DOMAIN'), [
            'from' => 'contact@excelliumconseils.com',
            'to' => $user->email,
            'subject' => 'Confirmation de votre sélection de produits',
            'template' => 'excellium_emailproduit', // à adapter selon ton template Mailgun
            'h:X-Mailgun-Variables' => json_encode($variables),
        ]);

        return response()->json(['success' => true]);
    }

}
