<?php

namespace App\Console\Commands;

use App\Models\Visit;
use App\Models\VisitSummary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateVisitSummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visits:generate-summary {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Générer le résumé quotidien des visites';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = $this->argument('date') ?? now()->subDay()->toDateString();
        
        $this->info("Génération du résumé des visites pour le {$date}...");
        
        // Récupérer les visites de la journée
        $visits = Visit::whereDate('visited_at', $date)->get();
        
        if ($visits->isEmpty()) {
            $this->warn('Aucune visite trouvée pour cette date.');
            return;
        }
        
        // Calculer les statistiques
        $totalVisits = $visits->count();
        $uniqueVisitors = $visits->unique('ip')->count();
        $authenticatedUsers = $visits->whereNotNull('user_id')->unique('user_id')->count();
        
        // Top pages
        $topPages = $visits->groupBy('url')
            ->map(function($group) {
                return [
                    'url' => $group->first()->url,
                    'count' => $group->count()
                ];
            })
            ->sortByDesc('count')
            ->take(10)
            ->values()
            ->toArray();
        
        // Visites par heure
        $visitsByHour = [];
        for ($i = 0; $i < 24; $i++) {
            $visitsByHour[$i] = $visits->filter(function($visit) use ($i) {
                return $visit->visited_at->hour == $i;
            })->count();
        }
        
        // Heure de pointe
        $peakHour = array_search(max($visitsByHour), $visitsByHour);
        
        // Jour le plus visité (nom du jour)
        $dayName = \Carbon\Carbon::parse($date)->isoFormat('dddd');
        
        // Créer ou mettre à jour le résumé
        VisitSummary::updateOrCreate(
            ['date' => $date],
            [
                'total_visits' => $totalVisits,
                'unique_visitors' => $uniqueVisitors,
                'authenticated_users' => $authenticatedUsers,
                'top_pages' => $topPages,
                'visits_by_hour' => $visitsByHour,
                'most_visited_day' => $dayName,
                'peak_hour' => $peakHour,
            ]
        );
        
        $this->info("✅ Résumé généré avec succès !");
        $this->table(
            ['Métrique', 'Valeur'],
            [
                ['Total visites', $totalVisits],
                ['Visiteurs uniques', $uniqueVisitors],
                ['Utilisateurs authentifiés', $authenticatedUsers],
                ['Heure de pointe', "{$peakHour}h"],
            ]
        );
    }
}
