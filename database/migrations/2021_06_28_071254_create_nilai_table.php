<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->integer('id_mapel')->unsigned();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('mapel')->onDelete('cascade');
            $table->string('tahun_ajaran',10)->nullable();
            $table->integer('semester')->default('1');
            $table->integer('UTS')->default('0');
            $table->integer('UAS')->default('0');
            $table->integer('pengetahuan')->default('0');
            $table->integer('keterampilan')->default('0');
            $table->integer('sikap')->default('0');
            $table->integer('jumlah')->default('0');
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
        Schema::dropIfExists('nilai');
    }
}
