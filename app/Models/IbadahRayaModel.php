<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class IbadahRayaModel extends Model
{
    use HasFactory;

    protected $table = 'ibadah_raya';

    // Kolom yang bisa diisi melalui mass assignment
    protected $guarded = ['id'];

    // Kolom yang seharusnya dianggap sebagai tanggal
    protected $dates = ['tanggal', 'waktu'];

    // Disable timestamps jika tidak ada kolom created_at dan updated_at
    public $timestamps = false;

    public function gereja() {
        return $this->belongsTo(Gereja::class);
    }

    public function scopeOfCurrentGereja($query) {
        return $query->where('gereja_id', Auth::user()->gereja->id);
    }
}
