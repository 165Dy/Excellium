<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssistanceComptableEntreprise extends Model
{
    use HasFactory;

    protected $table = 'assistance_comptable_entreprise';

    protected $fillable = [
        'user_id',
        'entreprise_id',
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
        'prix_indicatif' => 'decimal:2',
        'renouvellement_auto' => 'boolean',
        'date_debut' => 'date',
        'date_fin_prevue' => 'date',
        'date_fin_reelle' => 'date',
        'prochaine_echeance' => 'date',
    ];

    /**
     * Relation avec l'utilisateur (admin/super_admin uniquement)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->whereIn('type', ['admin', 'super_admin']);
    }

    /**
     * Relation avec l'entreprise
     */
    public function entreprise(): BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }

    /**
     * Scope pour filtrer par administrateurs uniquement
     */
    public function scopeByAdmins($query)
    {
        return $query->whereHas('user', function ($q) {
            $q->whereIn('type', ['admin', 'super_admin']);
        });
    }

    /**
     * Scope pour filtrer par statut
     */
    public function scopeByStatut($query, $statut)
    {
        return $query->where('statut', $statut);
    }

    /**
     * Scope pour les assistances actives
     */
    public function scopeActives($query)
    {
        return $query->whereIn('statut', ['valide', 'en_cours']);
    }

    /**
     * Scope pour les assistances terminées
     */
    public function scopeTerminees($query)
    {
        return $query->whereIn('statut', ['termine', 'annule']);
    }

    /**
     * Vérifier si l'assistance est active
     */
    public function isActive(): bool
    {
        return in_array($this->statut, ['valide', 'en_cours']);
    }

    /**
     * Vérifier si l'assistance est terminée
     */
    public function isTerminee(): bool
    {
        return in_array($this->statut, ['termine', 'annule']);
    }

    /**
     * Calculer la durée restante (en jours)
     */
    public function getDureeRestante(): ?int
    {
        if (!$this->date_fin_prevue) {
            return null;
        }

        $today = now();
        $dateFin = $this->date_fin_prevue;

        return $today->diffInDays($dateFin, false);
    }

    /**
     * Obtenir le badge de statut avec couleur
     */
    public function getStatutBadge(): array
    {
        $badges = [
            'brouillon' => ['class' => 'bg-secondary', 'text' => 'Brouillon'],
            'en_negociation' => ['class' => 'bg-warning', 'text' => 'En négociation'],
            'valide' => ['class' => 'bg-info', 'text' => 'Validé'],
            'en_cours' => ['class' => 'bg-primary', 'text' => 'En cours'],
            'suspendu' => ['class' => 'bg-warning', 'text' => 'Suspendu'],
            'termine' => ['class' => 'bg-success', 'text' => 'Terminé'],
            'annule' => ['class' => 'bg-danger', 'text' => 'Annulé'],
        ];

        return $badges[$this->statut] ?? ['class' => 'bg-secondary', 'text' => 'Inconnu'];
    }
}
