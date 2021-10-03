`<?php

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
            $table->integer('id_mapel')->unsigned();
            $table->string('nis', 10);
            $table->string('tahun_ajaran');
            $table->integer('semester')->default('1');
            $table->integer('nilai');
            $table->string('keterangan');
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('mapel')->onDelete('cascade');
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
