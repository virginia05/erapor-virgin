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
            $table->string('nis')->primary();
            $table->string('nama');
            $table->integer('id_kelas')->unsigned()->nullable();
            $table->string('alamat')->nullable();
            $table->string('tahun_mulai',10)->nullable();
            $table->string('ttl')->nullable();
            $table->integer('nomor')->nullable();
            $table->string('email')->nullable();
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
