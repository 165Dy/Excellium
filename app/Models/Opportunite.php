<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunite extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'description', 'slug', 'categorie_id', 'statut',
        'date_debut', 'date_fin', 'lieu', 'contact_email',
        'criteres', 'informations', 'fichier_joint',
        ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
        'criteres' => 'array',
        'informations' => 'array',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function postulations()
    {
        return $this->hasMany(Postulation::class);
    }

    // Scope pour opportunités en ligne et encore ouvertes
    public function scopeActives($query)
    {
        return $query->where('statut', 'en_ligne')
                     ->where(function($q) {
                         $q->whereNull('date_fin')
                           ->orWhere('date_fin', '>=', now());
                     });
    }
}
