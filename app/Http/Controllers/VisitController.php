<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Obtenir les statistiques pour le dashboard
     */
    public function dashboardStats()
    {
        $todayStats = Visit::todayStats();
        $visitsByDay = Visit::visitsByDay();
        $mostVisitedDay = Visit::mostVisitedDay();
        $topPages = Visit::topPages(5);

        // Calculer le total des visites sur 7 jours
        $totalVisits = collect($visitsByDay)->sum('count');

        return response()->json([
            'today' => $todayStats,
            'visits_by_day' => $visitsByDay,
            'most_visited_day' => $mostVisitedDay,
            'top_pages' => $topPages,
            'total_visits_week' => $totalVisits,
        ]);
    }

    /**
     * Obtenir les visites par jour (pour le graphique)
     */
    public function visitsByDay()
    {
        return response()->json([
            'data' => Visit::visitsByDay()
        ]);
    }

    /**
     * Obtenir les visites par heure
     */
    public function visitsByHour()
    {
        return response()->json([
            'data' => Visit::visitsByHour()
        ]);
    }

    /**
     * Obtenir les top pages visitées
     */
    public function topPages(Request $request)
    {
        $limit = $request->get('limit', 10);
        $days = $request->get('days', 7);

        return response()->json([
            'data' => Visit::topPages($limit, $days)
        ]);
    }

    /**
     * Afficher la page détaillée des visites
     */
    public function index()
    {
        return view('admin.visits.index');
    }

    /**
     * Obtenir les statistiques par device
     */
    public function deviceStats()
    {
        $stats = Visit::where('visited_at', '>=', now()->subDays(7))
            ->selectRaw('device, COUNT(*) as count')
            ->groupBy('device')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            'data' => $stats
        ]);
    }

    /**
     * Obtenir les visites récentes avec pagination
     */
    public function recent(Request $request)
    {
        $query = Visit::with('user')->orderByDesc('visited_at');

        // Filtrer par date si fourni
        if ($request->has('date')) {
            $query->whereDate('visited_at', $request->date);
        }

        $visits = $query->paginate(100);

        return response()->json([
            'data' => $visits->items(),
            'meta' => [
                'current_page' => $visits->currentPage(),
                'last_page' => $visits->lastPage(),
                'per_page' => $visits->perPage(),
                'total' => $visits->total()
            ]
        ]);
    }

    /**
     * Exporter toutes les données en CSV
     */
    public function export()
    {
        $visits = Visit::with('user')
            ->orderByDesc('visited_at')
            ->limit(10000)
            ->get();

        $filename = 'visites_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($visits) {
            $file = fopen('php://output', 'w');
            
            // BOM UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // En-têtes
            fputcsv($file, [
                'Date',
                'Heure',
                'Page',
                'IP',
                'Appareil',
                'Navigateur',
                'Plateforme',
                'Utilisateur',
                'Référent'
            ], ';');

            // Données
            foreach ($visits as $visit) {
                fputcsv($file, [
                    $visit->visited_at->format('d/m/Y'),
                    $visit->visited_at->format('H:i:s'),
                    $visit->url,
                    $visit->ip,
                    $visit->device ?? 'N/A',
                    $visit->browser ?? 'N/A',
                    $visit->platform ?? 'N/A',
                    $visit->user ? $visit->user->nom : 'Anonyme',
                    $visit->referrer ?? '-'
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
