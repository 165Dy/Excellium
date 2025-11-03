<?php

namespace App\Services;

use App\Mail\SuperAdminNotification;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SuperAdminNotificationService
{
    /**
     * Récupérer tous les super_admin
     */
    public static function getSuperAdmins()
    {
        return User::where('type', 'super_admin')
                   ->where('email', '!=', null)
                   ->get();
    }

    /**
     * Envoyer une notification aux super_admin
     */
    public static function sendNotification(array $data)
    {
        try {
            $superAdmins = self::getSuperAdmins();
            
            if ($superAdmins->isEmpty()) {
                Log::warning('Aucun super_admin trouvé pour l\'envoi de notification');
                return false;
            }

            // Ajouter les données par défaut
            $data = array_merge([
                'current_year' => date('Y'),
                'website_url' => config('app.url'),
                'admin_notifications_link' => route('admin.notifications.manage'),
            ], $data);

            // Envoyer l'email à chaque super_admin
            foreach ($superAdmins as $admin) {
                Mail::to($admin->email)->send(
                    new SuperAdminNotification($data, $data['action_type'])
                );
                
                Log::info("Email envoyé au super_admin: {$admin->email} pour action: {$data['action_type']}");
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi de notification aux super_admin: ' . $e->getMessage(), [
                'data' => $data,
                'trace' => $e->getTraceAsString()
            ]);
            return false;
        }
    }

    /**
     * Préparer les données pour une inscription formation
     */
    public static function prepareFormationInscriptionData($inscription, $formation)
    {
        return [
            'action_type' => 'Nouvelle inscription à une formation',
            'action_description' => 'Un utilisateur vient de s\'inscrire à une formation',
            'alert_type' => 'info',
            'user_name' => $inscription->nom . ' ' . $inscription->prenom,
            'user_email' => $inscription->email,
            'user_phone' => $inscription->telephone ?? '',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Formation',
            'entity_name' => $formation->titre,
            'entity_description' => $formation->description ?? '',
            'badge_type' => 'info',
            'entity_status' => ucfirst($inscription->statut ?? 'En attente'),
            'status_badge' => self::getStatusBadge($inscription->statut ?? 'en_attente'),
            'dashboard_link' => route('admin.formations.details_page', $formation->id),
        ];
    }

    /**
     * Préparer les données pour une candidature emploi
     */
    public static function prepareEmploiCandidatureData($candidature, $emploi)
    {
        return [
            'action_type' => 'Nouvelle candidature reçue',
            'action_description' => 'Un candidat a postulé à une offre d\'emploi',
            'alert_type' => 'success',
            'user_name' => $candidature->nom . ' ' . $candidature->prenom,
            'user_email' => $candidature->email,
            'user_phone' => $candidature->telephone ?? '',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Emploi',
            'entity_name' => $emploi->titre,
            'entity_description' => $emploi->type_contrat . ' - ' . $emploi->lieu,
            'additional_info' => 'CV et lettre de motivation joints',
            'badge_type' => 'success',
            'entity_status' => 'Nouveau',
            'status_badge' => 'success',
            'dashboard_link' => route('admin.emplois.show_candidat', $candidature->id),
        ];
    }

    /**
     * Préparer les données pour une postulation opportunité
     */
    public static function prepareOpportunitePostulationData($postulation, $opportunite)
    {
        return [
            'action_type' => 'Nouvelle postulation à une opportunité',
            'action_description' => 'Une entreprise a postulé à une opportunité d\'affaires',
            'alert_type' => 'warning',
            'user_name' => $postulation->nom_entreprise,
            'user_email' => $postulation->email,
            'user_phone' => $postulation->telephone ?? '',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Opportunité',
            'entity_name' => $opportunite->titre,
            'entity_description' => $opportunite->description ?? '',
            'additional_info' => $postulation->message ?? '',
            'badge_type' => 'warning',
            'entity_status' => 'À évaluer',
            'status_badge' => 'warning',
            'dashboard_link' => route('admin.opportunites.show', $opportunite->id),
        ];
    }

    /**
     * Préparer les données pour une souscription service
     */
    public static function prepareServiceInscriptionData($inscription, $service)
    {
        return [
            'action_type' => 'Nouvelle souscription à un service',
            'action_description' => 'Un client a souscrit à un service',
            'alert_type' => 'info',
            'user_name' => $inscription->nom . ' ' . $inscription->prenom,
            'user_email' => $inscription->email,
            'user_phone' => $inscription->telephone ?? '',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Service',
            'entity_name' => $service->nom,
            'entity_description' => $service->description ?? '',
            'additional_info' => $inscription->formule ?? '',
            'badge_type' => 'info',
            'entity_status' => ucfirst($inscription->statut ?? 'En attente'),
            'status_badge' => self::getStatusBadge($inscription->statut ?? 'en_attente'),
            'dashboard_link' => route('admin.services.index'),
        ];
    }

    /**
     * Préparer les données pour une sélection produit
     */
    public static function prepareProduitSelectionData($selection, $produit, $user)
    {
        // Support pour les utilisateurs avec prenom/nom ou name
        $userName = isset($user->prenom) && isset($user->nom) 
            ? $user->prenom . ' ' . $user->nom 
            : ($user->name ?? 'Utilisateur');
            
        return [
            'action_type' => 'Nouvelle sélection de produit',
            'action_description' => 'Un utilisateur a sélectionné un produit',
            'alert_type' => 'info',
            'user_name' => $userName,
            'user_email' => $user->email,
            'user_phone' => $user->telephone ?? '',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Produit',
            'entity_name' => $produit->nom,
            'entity_description' => $produit->description ?? '',
            'badge_type' => 'info',
            'dashboard_link' => route('admin.produits.index'),
        ];
    }

    /**
     * Obtenir le badge correspondant au statut
     */
    private static function getStatusBadge($statut)
    {
        $badges = [
            'en_attente' => 'warning',
            'accepte' => 'success',
            'acceptée' => 'success',
            'refuse' => 'danger',
            'refusée' => 'danger',
            'en_cours' => 'info',
            'termine' => 'success',
            'annule' => 'secondary',
        ];

        return $badges[$statut] ?? 'info';
    }
}

