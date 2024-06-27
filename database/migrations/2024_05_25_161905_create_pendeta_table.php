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
        Schema::create('pendeta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendeta');
            $table->string('jabatan');
            $table->string('gambar')->nullable();
            $table->text('deskripsi_singkat')->nullable();
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
        Schema::dropIfExists('pendeta');
    }
};
