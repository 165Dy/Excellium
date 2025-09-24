<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class Emploi extends Model
{
    use HasFactory;

    protected $table = 'emplois';

    protected $fillable = [
        'titre',
        'description',
        'entreprise',
        'type_contrat',
        'salaire_min',
        'salaire_max',
        'localisation',
        'competences_requises',
        'experience_requise',
        'niveau_etude',
        'nombre_postes',
        'date_expiration',
        'statut',
        'contact_email',
        'contact_telephone',
        'avantages',
    ];

    protected $dates = ['date_expiration'];

    // Relations
    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('statut', 'active');
    }

    public function scopeNonExpiree($query)
    {
        return $query->where('date_expiration', '>=', now()->toDateString());
    }

    // Accessors
    public function getSalaireFormatteAttribute()
    {
        if ($this->salaire_min && $this->salaire_max) {
            return number_format($this->salaire_min, 0, ',', ' ') . ' - ' . 
                   number_format($this->salaire_max, 0, ',', ' ') . ' FCFA';
        } elseif ($this->salaire_min) {
            return 'À partir de ' . number_format($this->salaire_min, 0, ',', ' ') . ' FCFA';
        }
        return 'Salaire à négocier';
    }

    public function getStatutBadgeAttribute()
    {
        $badges = [
            'active' => '<span class="badge bg-success">Active</span>',
            'fermee' => '<span class="badge bg-secondary">Fermée</span>',
            'pourvue' => '<span class="badge bg-info">Pourvue</span>',
        ];
        return $badges[$this->statut] ?? '<span class="badge bg-secondary">Inconnue</span>';
    }

    public function getTypeContratBadgeAttribute()
    {
        $badges = [
            'CDI' => '<span class="badge bg-primary">CDI</span>',
            'CDD' => '<span class="badge bg-warning">CDD</span>',
            'Stage' => '<span class="badge bg-info">Stage</span>',
            'Freelance' => '<span class="badge bg-success">Freelance</span>',
            'Alternance' => '<span class="badge bg-purple">Alternance</span>',
        ];
        return $badges[$this->type_contrat] ?? '<span class="badge bg-secondary">Autre</span>';
    }

    // Méthodes utilitaires
    public function isExpired()
    {
        return $this->date_expiration < now()->toDateString();
    }

    // public function joursRestants()
    // {
    //     return Carbon::parse($this->date_expiration)->diffInDays(now());
    // }
    public function joursRestants()
    {
        $aujourdhui = Carbon::today();
        $expiration = Carbon::parse($this->date_expiration);

        $diff = $aujourdhui->diffInDays($expiration, false); // false = peut être négatif si expiré

        if ($diff < 0) {
            return 0; // ou "Expiré"
        }

        return $diff;
    }
    public function isEmailCandidate($email)
    {
        return $this->candidatures()->where('email', $email)->exists();
    }

    public function totalCandidatures()
    {
        return $this->candidatures()->count();
    }

    public function candidaturesAcceptees()
    {
        return $this->candidatures()->where('statut', 'accepte')->count();
    }


}
