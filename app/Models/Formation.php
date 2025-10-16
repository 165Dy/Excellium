<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Categorie;
use App\Models\InscriptionFormation;
use App\Models\User;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'categorie_id',
        'programme',
        'cout',
        'prerequis',
        'bonus',
        'lieu',
        'date_debut',
        'date_fin',
        'file_path',
        'file_type',
    ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
        'cout' => 'decimal:2',
    ];

    // Relations
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(InscriptionFormation::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'formation_user')
            ->withPivot('message', 'statut')
            ->withTimestamps();
    }

    // Méthode pour récupérer uniquement les utilisateurs confirmés
    public function usersConfirmes(): BelongsToMany
    {
        return $this->users()->wherePivot('statut', 'confirme');
    }

    // Méthode pour récupérer uniquement les utilisateurs en attente
    public function usersEnAttente(): BelongsToMany
    {
        return $this->users()->wherePivot('statut', 'en_attente');
    }
    
    // Méthode utile pour compter les inscriptions
    public function nombreInscriptions()
    {
        return $this->inscriptions()->count();
    }
    
    // Méthode pour vérifier si un email est déjà inscrit
    public function isEmailInscrit($email)
    {
        return $this->inscriptions()->where('email', $email)->exists();
    }

    // Méthode pour vérifier si un utilisateur a accès aux documents (statut confirmé)
    public function userHasAccess($userId)
    {
        return $this->users()
            ->where('user_id', $userId)
            ->wherePivot('statut', 'confirme')
            ->exists();
    }
}
