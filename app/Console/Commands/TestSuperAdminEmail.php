<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SuperAdminNotificationService;
use App\Models\User;

class TestSuperAdminEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test-super-admin {type?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoyer un email de test aux super_admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->argument('type') ?? 'all';
        
        $this->info('🔍 Recherche des super_admin...');
        
        $superAdmins = SuperAdminNotificationService::getSuperAdmins();
        
        if ($superAdmins->isEmpty()) {
            $this->error('❌ Aucun super_admin trouvé dans la base de données !');
            $this->warn('💡 Conseil : Créez un super_admin avec la commande :');
            $this->line('   UPDATE users SET type = \'super_admin\' WHERE email = \'votre-email@example.com\';');
            return 1;
        }
        
        $this->info("✅ {$superAdmins->count()} super_admin(s) trouvé(s) :");
        foreach ($superAdmins as $admin) {
            $this->line("   - {$admin->name} ({$admin->email})");
        }
        $this->newLine();
        
        if ($type === 'all' || $type === 'formation') {
            $this->testFormationEmail();
        }
        
        if ($type === 'all' || $type === 'emploi') {
            $this->testEmploiEmail();
        }
        
        if ($type === 'all' || $type === 'opportunite') {
            $this->testOpportuniteEmail();
        }
        
        if ($type === 'all' || $type === 'service') {
            $this->testServiceEmail();
        }
        
        if ($type === 'all' || $type === 'produit') {
            $this->testProduitEmail();
        }
        
        $this->newLine();
        $this->info('✅ Test terminé ! Vérifiez vos logs et Mailgun.');
        
        return 0;
    }
    
    private function testFormationEmail()
    {
        $this->info('📧 Test : Inscription Formation...');
        
        $emailData = [
            'action_type' => 'Nouvelle inscription à une formation',
            'action_description' => 'Un utilisateur vient de s\'inscrire à une formation (TEST)',
            'alert_type' => 'info',
            'user_name' => 'Jean Dupont (Test)',
            'user_email' => 'jean.dupont@example.com',
            'user_phone' => '+237 677 12 34 56',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Formation',
            'entity_name' => 'Gestion de Projet Agile - FORMATION TEST',
            'entity_description' => 'Formation de 3 jours sur les méthodes Agile',
            'badge_type' => 'info',
            'entity_status' => 'En attente',
            'status_badge' => 'warning',
            'dashboard_link' => route('admin.dashboard'),
            'admin_notifications_link' => route('admin.notifications.manage'),
            'current_year' => date('Y'),
            'website_url' => config('app.url'),
        ];
        
        SuperAdminNotificationService::sendNotification($emailData);
        $this->line('   ✅ Email formation envoyé');
    }
    
    private function testEmploiEmail()
    {
        $this->info('📧 Test : Candidature Emploi...');
        
        $emailData = [
            'action_type' => 'Nouvelle candidature reçue',
            'action_description' => 'Un candidat a postulé à une offre d\'emploi (TEST)',
            'alert_type' => 'success',
            'user_name' => 'Marie Kouam (Test)',
            'user_email' => 'marie.kouam@example.com',
            'user_phone' => '+237 699 87 65 43',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Emploi',
            'entity_name' => 'Consultant Senior en Stratégie - EMPLOI TEST',
            'entity_description' => 'CDI - Yaoundé',
            'additional_info' => 'CV et lettre de motivation joints',
            'badge_type' => 'success',
            'entity_status' => 'Nouveau',
            'status_badge' => 'success',
            'dashboard_link' => route('admin.dashboard'),
            'admin_notifications_link' => route('admin.notifications.manage'),
            'current_year' => date('Y'),
            'website_url' => config('app.url'),
        ];
        
        SuperAdminNotificationService::sendNotification($emailData);
        $this->line('   ✅ Email emploi envoyé');
    }
    
    private function testOpportuniteEmail()
    {
        $this->info('📧 Test : Postulation Opportunité...');
        
        $emailData = [
            'action_type' => 'Nouvelle postulation à une opportunité',
            'action_description' => 'Une entreprise a postulé à une opportunité d\'affaires (TEST)',
            'alert_type' => 'warning',
            'user_name' => 'SARL TechCorp (Test)',
            'user_email' => 'contact@techcorp.cm',
            'user_phone' => '+237 655 44 33 22',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Opportunité',
            'entity_name' => 'Appel d\'offres - Digitalisation PME - OPPORTUNITÉ TEST',
            'entity_description' => 'Projet de transformation digitale',
            'additional_info' => 'Budget estimé: 50M FCFA',
            'badge_type' => 'warning',
            'entity_status' => 'À évaluer',
            'status_badge' => 'warning',
            'dashboard_link' => route('admin.dashboard'),
            'admin_notifications_link' => route('admin.notifications.manage'),
            'current_year' => date('Y'),
            'website_url' => config('app.url'),
        ];
        
        SuperAdminNotificationService::sendNotification($emailData);
        $this->line('   ✅ Email opportunité envoyé');
    }
    
    private function testServiceEmail()
    {
        $this->info('📧 Test : Souscription Service...');
        
        $emailData = [
            'action_type' => 'Nouvelle souscription à un service',
            'action_description' => 'Un client a souscrit à un service (TEST)',
            'alert_type' => 'info',
            'user_name' => 'Sophie Mbida (Test)',
            'user_email' => 'sophie.mbida@example.com',
            'user_phone' => '+237 677 99 88 77',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Service',
            'entity_name' => 'Assistance Comptable Mensuelle - SERVICE TEST',
            'entity_description' => 'Abonnement mensuel',
            'additional_info' => 'Formule Premium - 75 000 FCFA/mois',
            'badge_type' => 'info',
            'dashboard_link' => route('admin.dashboard'),
            'admin_notifications_link' => route('admin.notifications.manage'),
            'current_year' => date('Y'),
            'website_url' => config('app.url'),
        ];
        
        SuperAdminNotificationService::sendNotification($emailData);
        $this->line('   ✅ Email service envoyé');
    }
    
    private function testProduitEmail()
    {
        $this->info('📧 Test : Sélection Produit...');
        
        $emailData = [
            'action_type' => 'Nouvelle sélection de produit',
            'action_description' => 'Un utilisateur a sélectionné un produit (TEST)',
            'alert_type' => 'info',
            'user_name' => 'Paul Nguema (Test)',
            'user_email' => 'paul.nguema@example.com',
            'action_date' => now()->format('d/m/Y à H:i'),
            'entity_type' => 'Produit',
            'entity_name' => 'Logiciel de Gestion Commerciale - PRODUIT TEST',
            'entity_description' => 'Solution complète de gestion',
            'badge_type' => 'info',
            'dashboard_link' => route('admin.dashboard'),
            'admin_notifications_link' => route('admin.notifications.manage'),
            'current_year' => date('Y'),
            'website_url' => config('app.url'),
        ];
        
        SuperAdminNotificationService::sendNotification($emailData);
        $this->line('   ✅ Email produit envoyé');
    }
}
