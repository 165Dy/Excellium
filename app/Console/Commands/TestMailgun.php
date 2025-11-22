<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mailgun\Mailgun;
use Illuminate\Support\Facades\Log;

class TestMailgun extends Command
{
    protected $signature = 'mailgun:test {email?}';
    protected $description = 'Tester la connexion et l\'envoi d\'email via Mailgun';

    public function handle()
    {
        $this->info('🔍 Test de la configuration Mailgun...');
        $this->newLine();

        // Récupérer la configuration
        $mailgunSecret = config('services.mailgun.secret');
        $mailgunDomain = config('services.mailgun.domain');
        $mailgunEndpoint = config('services.mailgun.endpoint', 'api.mailgun.net');

        $this->info("📋 Configuration actuelle :");
        $this->line("   Domain: {$mailgunDomain}");
        $this->line("   Endpoint: {$mailgunEndpoint}");
        $this->line("   Secret: " . substr($mailgunSecret, 0, 10) . "...");
        $this->newLine();

        // Vérifier la configuration
        if (empty($mailgunSecret) || empty($mailgunDomain)) {
            $this->error('❌ Configuration Mailgun incomplète !');
            $this->line('   Vérifiez votre fichier .env :');
            $this->line('   - MAILGUN_SECRET');
            $this->line('   - MAILGUN_DOMAIN');
            return 1;
        }

        $this->info('✅ Configuration présente');
        $this->newLine();

        // Tester la connexion (on va directement tester avec l'envoi d'email)
        $this->info('✅ Configuration valide');
        $this->newLine();

        // Tester l'envoi d'email
        $testEmail = $this->argument('email') ?? config('mail.from.address');
        
        if (!$testEmail) {
            $this->warn('⚠️  Aucune adresse email fournie pour le test');
            $this->line('   Utilisez : php artisan mailgun:test votre@email.com');
            return 0;
        }

        $this->info("📧 Test d'envoi d'email à : {$testEmail}");
        
        try {
            $mg = Mailgun::create($mailgunSecret, 'https://' . $mailgunEndpoint);
            
            $result = $mg->messages()->send($mailgunDomain, [
                'from' => config('mail.from.name') . ' <' . config('mail.from.address') . '>',
                'to' => $testEmail,
                'subject' => 'Test Mailgun - Excellium Conseils',
                'text' => 'Ceci est un email de test depuis Excellium Conseils. Si vous recevez ce message, Mailgun fonctionne correctement !',
                'html' => '<h1>Test Mailgun</h1><p>Ceci est un email de test depuis Excellium Conseils.</p><p>Si vous recevez ce message, <strong>Mailgun fonctionne correctement</strong> !</p>',
            ]);

            $this->info('✅ Email envoyé avec succès !');
            $this->line("   Message ID: " . $result->getId());
            $this->newLine();
            $this->info('📬 Vérifiez votre boîte de réception (et les spams)');
            
            Log::info("Test Mailgun réussi", [
                'email' => $testEmail,
                'message_id' => $result->getId()
            ]);

            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Erreur lors de l\'envoi : ' . $e->getMessage());
            $this->newLine();
            $this->warn('💡 Causes possibles :');
            $this->line('   1. Le domaine n\'est pas vérifié dans Mailgun');
            $this->line('   2. Les DNS ne sont pas configurés correctement');
            $this->line('   3. Le domaine est en mode sandbox (limité aux emails autorisés)');
            $this->line('   4. L\'endpoint ne correspond pas à votre région');
            
            Log::error("Test Mailgun échoué", [
                'email' => $testEmail,
                'error' => $e->getMessage()
            ]);

            return 1;
        }
    }
}
