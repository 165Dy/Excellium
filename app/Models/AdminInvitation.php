<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminInvitation extends Model
{
    protected $fillable = ['token', 'email', 'expires_at', 'used_at', 'invited_by', 'nom', 'prenom'];
    protected $table = 'admin_invitations';
    protected $dates = ['expires_at', 'used_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invitedBy()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }
    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', now())->where('used_at', null);
    }
    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<', now());
    }
    public function scopeUsed($query)
    {
        return $query->where('used_at', '!=', null);
    }
    public function scopeNotUsed($query)
    {
        return $query->where('used_at', null);
    }
    public function scopeValid($query)
    {
        return $query->active()->notUsed();
    }
    public function scopeInvalid($query)
    {
        return $query->expired()->used();
    }
}
