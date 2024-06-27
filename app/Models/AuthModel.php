<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthModel extends Model
{
    use HasFactory;

    protected $table = 'user';

    public function username()
    {
        return 'username';
    }

    public function gereja() {
        return $this->belongsTo(Gereja::class);
    }

    
    public function scopeOfCurrentGereja($query) {
        return $query->where('gereja_id', Auth::user()->gereja->id);
    }
}
