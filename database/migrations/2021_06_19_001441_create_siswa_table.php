<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis', 10)->primary();
            $table->string('nama', 30);
            $table->string('gender')->nullable();
            $table->string('nama_ibu', 30)->nullable();
            $table->integer('id_kelas')->unsigned()->nullable();
            $table->string('alamat')->nullable();
            $table->string('tahun_mulai')->nullable();
            $table->date('ttl')->nullable();
            $table->integer('nomor')->nullable();
            $table->string('email', 30)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
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
        Schema::dropIfExists('siswa');
    }
}
