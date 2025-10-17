<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class InscriptionFormation extends Model
{
    protected $table = 'formation_user'; 
    
    protected $fillable = [
        'formation_id',
        'user_id',
        'nom',
        'email',
        'telephone',
        'message',
        'statut'
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    // Relations
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    // Scopes pour faciliter les requêtes
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'en_attente');
    }
    
    public function scopeConfirme($query)
    {
        return $query->where('statut', 'confirme');
    }
}