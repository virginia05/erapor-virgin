<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id_kelas');
            $table->string('kode_rombel')->nullable();
            $table->string('kode_guru')->nullable();
            $table->string('nama_kelas');
            $table->foreign('kode_guru')->references('kode_guru')->on('guru')->onDelete('cascade');
            $table->foreign('kode_rombel')->references('kode_rombel')->on('rombel')->onDelete('cascade');
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
        Schema::dropIfExists('kelas');
    }
}
