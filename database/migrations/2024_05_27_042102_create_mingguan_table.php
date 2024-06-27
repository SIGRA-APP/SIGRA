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
        Schema::create('mingguan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_minggu');
            $table->date('tanggal');
            $table->text('jumlah');
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
        Schema::dropIfExists('mingguan');
    }
};
