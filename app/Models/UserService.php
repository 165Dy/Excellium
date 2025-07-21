<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    protected $table = 'users_services';

    protected $fillable = [
        'user_id',
        'service_id',
        'description',
        'prix_indicatif',
        'duree_estimee',
        'caracteristiques',
        'type_contrat',
        'statut',
        'date_debut',
        'date_fin_prevue',
        'date_fin_reelle',
        'prochaine_echeance',
        'frequence_facturation',
        'objectifs',
        'renouvellement_auto',
    ];

    protected $casts = [
        'caracteristiques' => 'array',
        'renouvellement_auto' => 'boolean',
        'prix_indicatif' => 'decimal:2',
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
