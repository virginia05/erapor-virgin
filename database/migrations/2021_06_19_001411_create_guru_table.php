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
            $table->string('nama', 50);
            $table->string('gender',10)->nullable();
            $table->string('alamat',100)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nomor',14)->nullable();
            $table->string('email', 70)->nullable();
            $table->string('status_pegawai', 30)->nullable();
            $table->string('jenis_ptk', 40)->nullable();
            $table->string('gelar',20)->nullable();
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
