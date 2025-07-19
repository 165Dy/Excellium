<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Formation;
use App\Models\Produit;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function formations(): HasMany
    {
        return $this->hasMany(Formation::class);
    }

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
}

