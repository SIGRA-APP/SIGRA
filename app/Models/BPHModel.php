<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BPHModel extends Model
{
    use HasFactory;

    protected $table = 'bph'; // Nama tabel sesuai dengan tabel yang telah dibuat

    protected $guarded = ['id'];

    public function gereja() {
        return $this->belongsTo(Gereja::class);
    }
}
