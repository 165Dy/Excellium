<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use Mailgun\Mailgun;
use App\Models\Produit;
use App\Models\UserProduit;
use App\Services\SuperAdminNotificationService;

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
            'type'      => 'participant_autre', // par défaut
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
        $produitsSelectionnes = [];
        foreach ($request->produits as $produitId) {
            $userProduit = UserProduit::firstOrCreate([
                'user_id' => $user->id,
                'produit_id' => $produitId
            ]);
            $produitsSelectionnes[] = $userProduit;
        }

        // ✅ ENVOYER EMAIL AUX SUPER_ADMIN pour chaque produit sélectionné
        try {
            $produits = Produit::whereIn('id', $request->produits)->get();
            
            foreach ($produits as $produit) {
                $userProduit = $produitsSelectionnes[0] ?? null; // On peut prendre le premier comme exemple
                $emailData = SuperAdminNotificationService::prepareProduitSelectionData(
                    $userProduit, 
                    $produit, 
                    $user
                );
                SuperAdminNotificationService::sendNotification($emailData);
            }
            
            Log::info("Email envoyé aux super_admin pour sélection de produit(s)", [
                'user_id' => $user->id,
                'produits_count' => count($request->produits)
            ]);
        } catch (\Exception $e) {
            Log::error("Erreur envoi email super_admin (sélection produits): " . $e->getMessage());
            // On continue même si l'email super admin échoue
        }

        // Prépare les variables pour le template Mailgun (email client)
        $variables = [
            'title'   => 'Confirmation de votre sélection de produits',
            'name'    => $user->prenom . ' ' . $user->nom,
            'message' => "Notre équipe reviendra vers vous pour plus d'informations sur les produits sélectionnés.",
            'produits' => Produit::whereIn('id', $request->produits)->pluck('nom')->toArray(),
        ];

        try {
            $mg = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.eu.mailgun.net');
            $mg->messages()->send(env('MAILGUN_DOMAIN'), [
                'from'    => 'Excellium Conseils <contact@excelliumconseils.com>',
                'to'      => $user->email,
                'subject' => 'Confirmation de votre sélection de produits',
                'template' => 'excellium_emailwelcome', // nom du template dans Mailgun
                'h:X-Mailgun-Variables' => json_encode($variables),
            ]);
            
            Log::info("Email de confirmation envoyé au client", [
                'user_email' => $user->email,
                'produits_count' => count($request->produits)
            ]);
        } catch (\Exception $e) {
            Log::error("Erreur envoi email client (sélection produits): " . $e->getMessage());
            // On continue, l'inscription est quand même enregistrée
        }

        return response()->json(['success' => true]);
    }

}
