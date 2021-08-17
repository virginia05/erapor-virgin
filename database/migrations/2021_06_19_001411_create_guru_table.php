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
            $table->string('kode_guru')->primary();
            $table->string('nuptk')->nullable();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->bigInteger('nomor')->nullable();
            $table->string('email')->nullable();
            $table->string('status_pegawai')->nullable();
            $table->string('jenis_ptk')->nullable();
            $table->string('gelar')->nullable();
            $table->string('sertifikasi')->nullable();
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
