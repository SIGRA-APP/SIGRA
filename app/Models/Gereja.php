<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gereja extends Model
{
    use HasFactory;

    protected $table = 'gereja';

    protected $guarded = ['id'];

    public function users() {
        return $this->hasMany(Users::class);
    }

    public function ayat() {
        return $this->hasMany(AyatHarianModel::class);
    }

    public function bph() {
        return $this->hasMany(BPHModel::class);
    }

    public function bulanan() {
        return $this->hasMany(BulananModel::class);
    }

    public function dukacita() {
        return $this->hasMany(DukaCitaModel::class);
    }

    public function home() {
        return $this->hasMany(HomeModel::class);
    }

    public function ibadahRaya() {
        return $this->hasMany(IbadahRayaModel::class);
    }

    public function kas() {
        return $this->hasMany(KasModel::class);
    }

    public function keuangan(){
        return $this->hasMany(KeuanganModel::class);
    }

    public function mingguan(){
        return $this->hasMany(MingguanModel::class);
    }

    public function pendeta() {
        return $this->hasMany(PendetaModel::class);
    }

    public function sejarah() {
        return $this->hasMany(SejarahModel::class);
    }

    public function sukacita() {
        return $this->hasMany(SukaCitaModel::class);
    }

    public function upcoming() {
        return $this->hasMany(UpcomingModel::class);
    }

    public function warta() {
        return $this->hasMany(WartaModel::class);
    }

}
