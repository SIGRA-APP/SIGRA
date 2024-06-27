<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSejarahTable extends Migration
{
    public function up()
    {
        Schema::create('sejarah', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_gereja')->nullable();
            $table->date('tanggal_dibuat');
            $table->string('judul');
            $table->string('nama_gereja');
            $table->date('kapan_didirikan');
            $table->string('pendiri');
            $table->string('lokasi');
            $table->text('kutipan')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->nullable(); // Tambahkan kolom created_at
            $table->timestamp('updated_at')->nullable(); // Tambahkan kolom updated_at

            // Adding the foreign key column
            $table->unsignedBigInteger('gereja_id')->nullable();
            $table->foreign('gereja_id')->references('id')->on('gereja');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sejarah');
    }
}
