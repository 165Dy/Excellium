<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Categorie;
use App\Models\InscriptionFormation;

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
}
