<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Mailgun\Mailgun;

class ServiceController extends Controller
{
    public function inscriptionAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'telephone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation: ' . implode(' ', $validator->errors()->all())
            ]);
        }

        try {
            DB::beginTransaction();

            // Créer l'utilisateur
            $user = User::create([
                'email' => $request->email,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'type' => 'autre',
                'password' => null
            ]);

            // Récupérer ou créer le service "Audit & Conseils"
            $service = Service::firstOrCreate(
                ['nom' => 'Audit & Conseils'],
                [
                    'slug' => 'audit-conseils',
                    'description' => 'Services d\'audit et de conseil pour optimiser les performances de votre entreprise'
                ]
            );

            // Créer l'abonnement au service
            $userService = UserService::create([
                'user_id' => $user->id,
                'service_id' => $service->id,
                'statut' => 'brouillon',
                
            ]);

            // Envoi de l'email de confirmation
            $mg = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.eu.mailgun.net');
            $variables = [
                'name' => $user->prenom . ' ' . $user->nom,
                'service' => $service->nom,
                'message' => "Merci pour votre inscription à nos services d'audit et conseil. Notre équipe vous contactera dans les plus brefs délais pour discuter de vos besoins spécifiques."
            ];
            
            $mg->messages()->send(env('MAILGUN_DOMAIN'), [
                'from' => 'contact@excelliumconseils.com',
                'to' => $user->email,
                'subject' => 'Confirmation de votre inscription - Audit & Conseils',
                'template' => 'Excellium_inscription_service',
                'h:X-Mailgun-Variables' => json_encode($variables),
            ]);

            DB::commit();

            Log::info('Nouvel utilisateur inscrit au service Audit & Conseils', [
                'user_id' => $user->id,
                'email' => $user->email,
                'service_id' => $service->id,
                'user_service_id' => $userService->id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Inscription réussie ! Un email de confirmation vous a été envoyé.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur inscription service: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }
}
