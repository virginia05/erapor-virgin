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
            $table->string('nuptk', 16)->primary();
            $table->string('nama', 40);
            $table->string('gender',10)->nullable();
            $table->string('alamat',50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nomor',14)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('status_pegawai', 30)->nullable();
            $table->string('jenis_ptk', 20)->nullable();
            $table->string('gelar',15)->nullable();
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
