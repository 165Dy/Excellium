<?php

namespace App\Console\Commands;

use App\Models\Visit;
use Illuminate\Console\Command;
use Carbon\Carbon;

class GenerateTestVisits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visits:generate-test {days=7}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Générer des visites de test pour les X derniers jours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = (int) $this->argument('days');
        
        $this->info("🚀 Génération de visites de test pour les {$days} derniers jours...");
        
        $pages = [
            'formations',
            'formations/laravel',
            'formations/techniques-expression',
            'emplois',
            'opportunites',
            'contact',
            'about',
            'articles',
            'services',
            'produits',
        ];
        
        $devices = ['desktop', 'mobile', 'tablet'];
        $browsers = ['Chrome', 'Firefox', 'Safari', 'Edge'];
        $platforms = ['Windows', 'Mac OS X', 'Linux', 'Android', 'iOS'];
        
        $ips = [
            '192.168.1.100',
            '192.168.1.101',
            '192.168.1.102',
            '10.0.0.50',
            '10.0.0.51',
            '172.16.0.10',
            '172.16.0.11',
        ];
        
        $totalVisits = 0;
        
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            // Plus de visites en semaine qu'en week-end
            $isWeekend = $date->isWeekend();
            $minVisits = $isWeekend ? 30 : 50;
            $maxVisits = $isWeekend ? 80 : 150;
            
            $dailyVisits = rand($minVisits, $maxVisits);
            
            $this->line("📅 {$date->format('d/m/Y')} ({$date->isoFormat('dddd')}) - {$dailyVisits} visites");
            
            for ($j = 0; $j < $dailyVisits; $j++) {
                // Générer une heure aléatoire (plus de visites entre 9h et 18h)
                $hour = rand(0, 100);
                if ($hour < 70) {
                    // 70% des visites entre 8h et 19h
                    $hour = rand(8, 19);
                } else {
                    // 30% des visites le reste du temps
                    $hour = rand(0, 23);
                }
                
                $minute = rand(0, 59);
                $second = rand(0, 59);
                
                $visitTime = $date->copy()->setTime($hour, $minute, $second);
                
                Visit::create([
                    'user_id' => null, // Visiteurs anonymes pour le test
                    'url' => $pages[array_rand($pages)],
                    'ip' => $ips[array_rand($ips)],
                    'user_agent' => 'Mozilla/5.0 (Test)',
                    'referrer' => rand(0, 3) == 0 ? 'https://google.com' : null,
                    'device' => $devices[array_rand($devices)],
                    'browser' => $browsers[array_rand($browsers)],
                    'platform' => $platforms[array_rand($platforms)],
                    'country' => 'CI', // Côte d'Ivoire
                    'visited_at' => $visitTime,
                ]);
                
                $totalVisits++;
            }
        }
        
        $this->newLine();
        $this->info("✅ {$totalVisits} visites de test créées avec succès !");
        $this->info("📊 Vous pouvez maintenant voir les statistiques dans le dashboard.");
    }
}
