<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserService extends Model
{
    use HasFactory;
    protected $table = 'user_services';
    protected $fillable = ['user_id', 'service'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
