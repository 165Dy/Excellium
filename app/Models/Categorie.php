<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Formation;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function formations(): HasMany
    {
        return $this->hasMany(Formation::class);
    }
}

