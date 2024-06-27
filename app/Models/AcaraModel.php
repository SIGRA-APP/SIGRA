<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AcaraModel extends Model
{
    use HasFactory;

    public function gereja() {
        return $this->belongsTo(Gereja::class);
    }

}
