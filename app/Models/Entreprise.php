<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'activite',
        'image',
        'situation_geographique',
        'rccm',
        'ncc',
        'nom_dirigeant',
        'tdu',
        'assist',
    ];

    protected $casts = [
        'assist' => 'boolean',
    ];

    /**
     * Relation avec les assistances comptables
     */
    public function assistancesComptables(): HasMany
    {
        return $this->hasMany(AssistanceComptableEntreprise::class);
    }

    /**
     * Obtenir les assistances actives
     */
    public function assistancesActives(): HasMany
    {
        return $this->assistancesComptables()->actives();
    }

    /**
     * Obtenir les assistances terminées
     */
    public function assistancesTerminees(): HasMany
    {
        return $this->assistancesComptables()->terminees();
    }

    /**
     * Scope pour filtrer les entreprises assistées
     */
    public function scopeAssistees($query)
    {
        return $query->where('assist', true);
    }

    /**
     * Scope pour filtrer les entreprises non assistées
     */
    public function scopeNonAssistees($query)
    {
        return $query->where('assist', false);
    }

    /**
     * Vérifier si l'entreprise est actuellement assistée
     */
    public function estAssistee(): bool
    {
        return $this->assist;
    }

    /**
     * Obtenir le badge d'assistance
     */
    public function getAssistBadge(): array
    {
        if ($this->assist) {
            return [
                'class' => 'bg-success',
                'text' => 'Assistée',
                'icon' => 'ri-check-line'
            ];
        }

        return [
            'class' => 'bg-secondary',
            'text' => 'Non assistée',
            'icon' => 'ri-close-line'
        ];
    }

    /**
     * Obtenir le nombre d'assistances actives
     */
    public function getNombreAssistancesActives(): int
    {
        return $this->assistancesActives()->count();
    }

    /**
     * Obtenir l'assistance comptable la plus récente
     */
    public function getDerniereAssistance(): ?AssistanceComptableEntreprise
    {
        return $this->assistancesComptables()
            ->orderBy('created_at', 'desc')
            ->first();
    }

    /**
     * Marquer l'entreprise comme assistée
     */
    public function marquerCommeAssistee(): bool
    {
        return $this->update(['assist' => true]);
    }

    /**
     * Marquer l'entreprise comme non assistée
     */
    public function marquerCommeNonAssistee(): bool
    {
        return $this->update(['assist' => false]);
    }
}
