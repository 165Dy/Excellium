<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'total_visits',
        'unique_visitors',
        'authenticated_users',
        'top_pages',
        'visits_by_hour',
        'most_visited_day',
        'peak_hour',
    ];

    protected $casts = [
        'date' => 'date',
        'top_pages' => 'array',
        'visits_by_hour' => 'array',
    ];

    /**
     * Obtenir le résumé d'aujourd'hui ou le créer
     */
    public static function today()
    {
        return self::firstOrCreate(
            ['date' => now()->toDateString()],
            [
                'total_visits' => 0,
                'unique_visitors' => 0,
                'authenticated_users' => 0,
            ]
        );
    }

    /**
     * Obtenir les résumés des 7 derniers jours
     */
    public static function lastWeek()
    {
        return self::where('date', '>=', now()->subDays(6)->toDateString())
            ->orderBy('date')
            ->get();
    }
}
