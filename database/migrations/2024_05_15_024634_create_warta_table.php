<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warta', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('judul');
            $table->string('deskripsi');
            $table->date('tanggal');

            // Pelayanan Pagi
            $table->string('pengkotbah_pagi')->nullable();
            $table->string('liturgis_pagi')->nullable();
            $table->string('singers_pagi')->nullable();
            $table->string('pemusik_pagi')->nullable();
            $table->string('tamborin_pagi')->nullable();
            $table->string('penyambut_jemaat_pagi')->nullable();
            $table->string('operator_camera_pagi')->nullable();
            $table->string('operator_computer_pagi')->nullable();
            $table->string('operator_sound_pagi')->nullable();

            // Pelayanan Siang
            $table->string('pengkotbah_siang')->nullable();
            $table->string('liturgis_siang')->nullable();
            $table->string('singers_siang')->nullable();
            $table->string('pemusik_siang')->nullable();
            $table->string('tamborin_siang')->nullable();
            $table->string('penyambut_jemaat_siang')->nullable();
            $table->string('operator_camera_siang')->nullable();
            $table->string('operator_computer_siang')->nullable();
            $table->string('operator_sound_siang')->nullable();

            // Detail
            $table->longtext('tata_ibadah')->nullable();
            $table->longtext('laporan_persembahan')->nullable();
            $table->longtext('laporan_perpuluhan')->nullable();

            // Adding the foreign key column
            $table->unsignedBigInteger('gereja_id')->nullable();
            $table->foreign('gereja_id')->references('id')->on('gereja');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warta');
    }
};
