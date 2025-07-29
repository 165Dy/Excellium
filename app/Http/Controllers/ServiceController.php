<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\UserService;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Mailgun\Mailgun;
use Exception;

class ServiceController extends Controller
{
    // Page d'accueil des services (admin)
    public function index()
    {
        return view('admin.services.index');
    }

    // Liste des services pour DataTable
    public function list()
    {
        $services = Service::with('categorie')
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($service) {
                return [
                    'id' => $service->id,
                    'nom' => $service->nom,
                    'description' => $service->description,
                    'categorie' => $service->categorie ? $service->categorie->nom : 'Non défini',
                    'actions' => view('admin.services.partials.actions', compact('service'))->render()
                ];
            });

        return response()->json(['data' => $services]);
    }

    // Récupérer un service pour modification
    public function show($id)
    {
        try {
            $service = Service::findOrFail($id);
            return response()->json($service);
        } catch (Exception $e) {
            return response()->json(['error' => 'Service non trouvé'], 404);
        }
    }

    public function showClient($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('clients.Nos_Services.Show', compact('service'));
    }

    // Créer un service
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
                'slug' => 'required|string|max:255|unique:services',
                'categorie_id' => 'required|exists:categories,id'
            ]);

            $service = Service::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Service créé avec succès',
                'data' => $service
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création: ' . $e->getMessage()
            ], 500);
        }
    }

    // Modifier un service
    public function update(Request $request, $id)
    {
        try {
            $service = Service::findOrFail($id);
            
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'nullable|string',
                'slug' => 'required|string|max:255|unique:services,slug,' . $id,
                'categorie_id' => 'required|exists:categories,id'
            ]);

            $service->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Service modifié avec succès',
                'data' => $service
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la modification: ' . $e->getMessage()
            ], 500);
        }
    }

    // Supprimer un service
    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return response()->json([
                'success' => true,
                'message' => 'Service supprimé avec succès'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression: ' . $e->getMessage()
            ], 500);
        }
    }

    // Inscription générique pour tous les services
    public function inscriptionAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'telephone' => 'nullable|string|max:20',
            'service_id' => 'required|exists:services,id',
            'description' => 'nullable|string|max:1000',
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

            // Récupérer le service
            $service = Service::findOrFail($request->service_id);

            // Créer l'abonnement au service
            $userService = UserService::create([
                'user_id' => $user->id,
                'service_id' => $service->id,
                'description' => $request->description,
                'statut' => 'brouillon',
            ]);

            // Envoi de l'email de confirmation
            $mg = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.eu.mailgun.net');
            $variables = [
                'title' => 'Confirmation de votre inscription - ' . $service->nom,
                'name' => $user->prenom . ' ' . $user->nom,
                'service' => $service->nom,
                'message' => "Merci pour votre inscription à nos services. Notre équipe vous contactera dans les plus brefs délais pour discuter de vos besoins spécifiques."
            ];
            
            $mg->messages()->send(env('MAILGUN_DOMAIN'), [
                'from' => 'Excellium Conseils <contact@excelliumconseils.com>',
                'to' => $user->email,
                'subject' => 'Confirmation de votre inscription - ' . $service->nom,
                'template' => 'Excellium_inscription_service',
                'h:X-Mailgun-Variables' => json_encode($variables),
            ]);

            DB::commit();

            Log::info('Nouvel utilisateur inscrit au service', [
                'user_id' => $user->id,
                'email' => $user->email,
                'service_id' => $service->id,
                'user_service_id' => $userService->id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Inscription réussie ! Un email de confirmation vous a été envoyé.'
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Erreur inscription service: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }
}
