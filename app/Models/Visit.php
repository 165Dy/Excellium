<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'url',
        'ip',
        'user_agent',
        'referrer',
        'device',
        'browser',
        'platform',
        'country',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    public $timestamps = false;

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Statistiques du jour
     */
    public static function todayStats()
    {
        $today = now()->startOfDay();
        
        return [
            'total_visits' => self::where('visited_at', '>=', $today)->count(),
            'unique_visitors' => self::where('visited_at', '>=', $today)
                ->distinct('ip')
                ->count('ip'),
            'authenticated_users' => self::where('visited_at', '>=', $today)
                ->whereNotNull('user_id')
                ->distinct('user_id')
                ->count('user_id'),
        ];
    }

    /**
     * Visites par jour de la semaine (7 derniers jours)
     */
    public static function visitsByDay()
    {
        $visits = self::where('visited_at', '>=', now()->subDays(6)->startOfDay())
            ->select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $days[] = [
                'day' => now()->subDays($i)->isoFormat('ddd'), // Lun, Mar, Mer, etc.
                'date' => $date,
                'count' => $visits->get($date)?->count ?? 0,
            ];
        }

        return $days;
    }

    /**
     * Top pages visitées
     */
    public static function topPages($limit = 10, $days = 7)
    {
        return self::where('visited_at', '>=', now()->subDays($days))
            ->select('url', DB::raw('COUNT(*) as visits'))
            ->groupBy('url')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get();
    }

    /**
     * Visites par heure (aujourd'hui)
     */
    public static function visitsByHour()
    {
        $visits = self::whereDate('visited_at', now()->toDateString())
            ->select(
                DB::raw('HOUR(visited_at) as hour'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->keyBy('hour');

        $hours = [];
        for ($i = 0; $i < 24; $i++) {
            $hours[$i] = $visits->get($i)?->count ?? 0;
        }

        return $hours;
    }

    /**
     * Jour le plus visité (7 derniers jours)
     */
    public static function mostVisitedDay()
    {
        $days = self::visitsByDay();
        $maxVisits = collect($days)->max('count');
        $mostVisited = collect($days)->firstWhere('count', $maxVisits);

        return [
            'day' => $mostVisited['day'] ?? 'N/A',
            'date' => $mostVisited['date'] ?? null,
            'visits' => $maxVisits ?? 0,
        ];
    }
}
