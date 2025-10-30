<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification;

class GenerateTestNotifications extends Command
{
    protected $signature = 'notifications:generate-test {count=10}';
    protected $description = 'Générer des notifications de test';

    public function handle()
    {
        $count = (int) $this->argument('count');
        
        $this->info("🔔 Génération de $count notifications de test...");
        
        $types = [
            [
                'type' => 'formation_inscription',
                'title' => 'Nouvelle inscription',
                'message' => 'Jean Dupont s\'est inscrit(e) à la formation "Introduction au Marketing Digital"',
                'icon' => 'ri-book-open-line',
                'badge_color' => 'primary',
                'priority' => 'high',
            ],
            [
                'type' => 'candidature_nouvelle',
                'title' => 'Nouvelle candidature',
                'message' => 'Marie Martin a postulé pour "Développeur Full Stack"',
                'icon' => 'ri-briefcase-line',
                'badge_color' => 'success',
                'priority' => 'high',
            ],
            [
                'type' => 'postulation_nouvelle',
                'title' => 'Nouvelle postulation',
                'message' => 'Pierre Durand a postulé pour "Opportunité Consulting"',
                'icon' => 'ri-hand-coin-line',
                'badge_color' => 'info',
                'priority' => 'high',
            ],
            [
                'type' => 'service_inscription',
                'title' => 'Nouvelle inscription à un service',
                'message' => 'Sophie Bernard s\'est inscrit(e) au service "Assistance Comptable"',
                'icon' => 'ri-customer-service-2-line',
                'badge_color' => 'warning',
                'priority' => 'normal',
            ],
            [
                'type' => 'produit_selection',
                'title' => 'Sélection de produit(s)',
                'message' => 'Thomas Leroy a sélectionné : Pack Premium, Formation Advanced',
                'icon' => 'ri-shopping-bag-line',
                'badge_color' => 'secondary',
                'priority' => 'normal',
            ],
            [
                'type' => 'system',
                'title' => 'Mise à jour système',
                'message' => 'Une nouvelle version est disponible',
                'icon' => 'ri-notification-line',
                'badge_color' => 'primary',
                'priority' => 'low',
            ],
        ];
        
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        
        for ($i = 0; $i < $count; $i++) {
            $template = $types[array_rand($types)];
            
            Notification::create([
                'type' => $template['type'],
                'title' => $template['title'],
                'message' => $template['message'],
                'icon' => $template['icon'],
                'badge_color' => $template['badge_color'],
                'priority' => $template['priority'],
                'action_url' => null,
                'action_text' => null,
                'is_read' => rand(0, 3) > 0 ? false : true, // 75% non lues
                'created_at' => now()->subMinutes(rand(1, 1440)), // Dans les dernières 24h
            ]);
            
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine(2);
        $this->info("✅ $count notifications générées avec succès !");
        
        return 0;
    }
}

