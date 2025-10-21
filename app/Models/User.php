<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function services()
    {
        return $this->hasMany(UserService::class);
    }

    /**
     * Relation avec les assistances comptables
     */
    public function assistancesComptables()
    {
        return $this->hasMany(AssistanceComptableEntreprise::class);
    }

    /**
     * Vérifier si l'utilisateur est un administrateur
     */
    public function isAdmin(): bool
    {
        return in_array($this->type, ['admin', 'super_admin']);
    }

    /**
     * Vérifier si l'utilisateur est un super administrateur
     */
    public function isSuperAdmin(): bool
    {
        return $this->type === 'super_admin';
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'formation_user')
                    ->withPivot('message', 'statut')
                    ->withTimestamps();
    }


    // Si un admin envoie des invitations
    public function invitations()
    {
        return $this->hasMany(AdminInvitation::class, 'invited_by');
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
     // Postulations aux opportunités
    public function postulations()
    {
        return $this->hasMany(Postulation::class);
    }

}
