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
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->time('jam_mulai_pagi')->nullable();
            $table->time('jam_selesai_pagi')->nullable();
            $table->time('jam_mulai_siang')->nullable();
            $table->time('jam_selesai_siang')->nullable();
            $table->string('youtube')->nullable();
            $table->string('link')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->integer('total_jemaat')->nullable();
            $table->integer('total_bph')->nullable();
            $table->integer('total_pendeta')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();
            
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
        Schema::dropIfExists('home');
    }
};
