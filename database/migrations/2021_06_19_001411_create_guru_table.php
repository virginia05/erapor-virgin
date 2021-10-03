<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->integer('kode_guru')->primary();
            $table->string('nuptk', 16)->nullable();
            $table->string('nama', 30);
            $table->string('gender')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->bigInteger('nomor')->nullable();
            $table->string('email', 30)->nullable();
            $table->string('status_pegawai', 25)->nullable();
            $table->string('jenis_ptk', 30)->nullable();
            $table->string('gelar')->nullable();
            $table->string('sertifikasi', 30)->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('guru');
    }
}
