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
            $table->string('nama', 50);
            $table->string('gender',10)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->integer('id_kelas')->unsigned()->nullable();
            $table->string('alamat',100)->nullable();
            $table->string('tahun_mulai',9)->nullable();
            $table->date('ttl')->nullable();
            $table->string('nomor',14)->nullable();
            $table->string('email', 70)->nullable();
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
