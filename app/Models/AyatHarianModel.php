<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AyatHarianModel extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'ayat_harian';

    protected $guarded = ['id'];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function gereja() {
        return $this->belongsTo(Gereja::class);
    }

    public function scopeOfCurrentGereja($query) {
        return $query->where('gereja_id', Auth::user()->gereja->id);
    }
}
