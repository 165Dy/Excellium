<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserService extends Model
{
    use HasFactory;
    protected $table = 'user_services';
    protected $fillable = [
        'user_id',
        'service_id',
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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
