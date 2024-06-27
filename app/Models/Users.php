<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'username', 'password', 'gereja_id'
    ];

    protected $hidden = [
        'password', 'remember_token', 'role'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gereja() {
        return $this->belongsTo(Gereja::class);
    }

    
}
