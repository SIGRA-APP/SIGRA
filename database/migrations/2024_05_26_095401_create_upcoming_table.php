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
        Schema::create('upcoming', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('hari');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->string('gambar');
            $table->text('detail_kegiatan');
            $table->timestamps();

           // Adding the foreign key column
           $table->unsignedBigInteger('gereja_id')->nullable();
           $table->foreign('gereja_id')->references('id')->on('gereja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upcoming');
    }
};
