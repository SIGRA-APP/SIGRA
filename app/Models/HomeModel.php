<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HomeModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'home'; // Nama tabel yang sesuai dengan migrasi

    protected $guarded = ['id'];

    public function gereja() {
        return $this->belongsTo(Gereja::class);
    }

    public function scopeOfCurrentGereja($query) {
        return $query->where('gereja_id', Auth::user()->gereja->id);
    }
}
