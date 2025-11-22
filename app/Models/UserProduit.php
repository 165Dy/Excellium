<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProduit extends Model
{
    protected $table = 'users_produits';

    protected $fillable = [
        'user_id',
        'produit_id',
        'description',
        'statut',
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le produit
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
