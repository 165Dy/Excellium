<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Emploi;

class Candidature extends Model
{
    use HasFactory;

    protected $table = 'candidatures';

    protected $fillable = [
        'emploi_id',
        'nom',
        'email',
        'telephone',
        'cv_path',
        'lettre_motivation',
        'message',
        'statut',
    ];

    // Relations
    public function emploi()
    {
        return $this->belongsTo(Emploi::class, 'emploi_id');
    }

    // Scopes
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'en_attente');
    }

    public function scopeAcceptee($query)
    {
        return $query->where('statut', 'accepte');
    }
}
