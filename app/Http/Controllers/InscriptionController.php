<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

use Mailgun\Mailgun;

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

    public function saveServices(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'services' => 'required|array|min:1'
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        // Enregistre les services
        foreach ($request->services as $service) {
            $user->services()->create(['service' => $service]);
        }

        // Prépare les variables pour le template Mailgun
        $variables = [
            'name' => $user->prenom . ' ' . $user->nom,
            'services' => implode(', ', $request->services),
            'message' => "Notre équipe reviendra vers vous pour plus d'informations."
        ];

        $mg = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.eu.mailgun.net');

        // Envoi du mail via l'API Mailgun
        
        $result = $mg->messages()->send(env('MAILGUN_DOMAIN'), [
            'from' => 'contact@excelliumconseils.com',
            'to' => $user->email,
            'subject' => 'Bienvenue sur Excellium Conseils',
            'template' => 'excellium_emailwelcome',
            'h:X-Mailgun-Variables' => json_encode($variables),
        ]);

        return response()->json(['success' => true]);
    }

}
