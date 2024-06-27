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
        Schema::create('ibadah_raya', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('judul');
            $table->string('tema')->nullable();
            $table->text('ayat')->nullable();
            $table->string('hari')->nullable();
            $table->date('tanggal');
            $table->time('waktu')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('pengkothbah')->nullable();
            $table->text('detail_kegiatan')->nullable();
            $table->timestamps();

            // Adding the foreign key column
            $table->unsignedBigInteger('gereja_id')->nullable();
            $table->foreign('gereja_id')->references('id')->on('gereja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibadah_raya');
    }
};
