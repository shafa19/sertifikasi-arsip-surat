<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipsuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsipsurat', function (Blueprint $table) {
            //membuat tabel arsipsurat dengan atribut:
            $table->increments('id_arsipsurat');
            $table->string('no_surat')->unique();
            $table->string('judul');
            $table->string('file_surat');
            $table->unsignedInteger('id_kategori');
            //pembuatan foreign key pada tabel arsipsurat yang berelasi dengan tabel kategorisurat
            $table->foreign('id_kategori')->references('id_kategori')->on('kategorisurat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsipsurat');
    }
}
