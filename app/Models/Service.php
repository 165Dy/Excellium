<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nom',
        'slug',
        'description',
        'categorie_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Relation avec les utilisateurs (many-to-many)
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_services')
                    ->withPivot([
                        'description', 
                        'prix_indicatif',
                        'duree_estimee',
                        'caracteristiques',
                        'type_contrat',
                        'date_debut',
                        'date_fin_prevue',
                        'date_fin_reelle',
                        'prochaine_echeance',
                        'frequence_facturation',
                        'objectifs',
                        'renouvellement_auto'
                    ])
                    ->withTimestamps();
    }

    // Relation avec UserService (table pivot)
    public function userServices()
    {
        return $this->hasMany(UserService::class);
    }
}
