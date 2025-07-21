<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Emploi extends Model
{
    use HasFactory;

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
            'active' => '<span class="badge bg-success">@lang('extracted.active')</span>',
            'fermee' => '<span class="badge bg-secondary">@lang('extracted.fermee')</span>',
            'pourvue' => '<span class="badge bg-info">@lang('extracted.pourvue')</span>',
        ];
        return $badges[$this->@lang('extracted.statut')<span class="badge bg-secondary">@lang('extracted.inconnue')</span>';
    }

    public function getTypeContratBadgeAttribute()
    {
        $badges = [
            'CDI' => '<span class="badge bg-primary">@lang('extracted.cdi')</span>',
            'CDD' => '<span class="badge bg-warning">@lang('extracted.cdd')</span>',
            'Stage' => '<span class="badge bg-info">@lang('extracted.stage')</span>',
            'Freelance' => '<span class="badge bg-success">@lang('extracted.freelance')</span>',
            'Alternance' => '<span class="badge bg-purple">@lang('extracted.alternance')</span>',
        ];
        return $badges[$this->@lang('extracted.type_contrat')<span class="badge bg-secondary">@lang('extracted.autre')</span>';
    }

    // Méthodes utilitaires
    public function isExpired()
    {
        return $this->date_expiration < now()->toDateString();
    }

    public function joursRestants()
    {
        return Carbon::parse($this->date_expiration)->diffInDays(now());
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