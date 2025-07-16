<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'slug',
        'description',
    ];

    // Génération automatique du slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->nom);
            }
        });
    }

    public function userServices()
    {
        return $this->hasMany(UserService::class);
    }

}
