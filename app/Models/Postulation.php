<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'statut', 'user_id', 'opportunite_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opportunite()
    {
        return $this->belongsTo(Opportunite::class);
    }

    // Scope pour postulations en attente
    public function scopeActives($query)
    {
        return $query->where('statut', 'en_attente')
                     ->where(function($q) {
                         $q->whereNull('updated_at')
                           ->orWhere('updated_at', '>=', now());
                     });
    }
}
