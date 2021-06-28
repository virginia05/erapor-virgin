<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->string('kode_mapel');
            $table->string('nis');
            $table->bigInteger('id_pengetahuan')->unsigned();
            $table->integer('nilai');
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('kode_mapel')->references('kode_mapel')->on('mapel')->onDelete('cascade');
            $table->foreign('id_pengetahuan')->references('id')->on('pengetahuan')->onDelete('cascade');
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
        Schema::dropIfExists('tugas');
    }
}
