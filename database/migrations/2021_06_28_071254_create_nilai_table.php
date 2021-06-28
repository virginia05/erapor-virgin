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
            $table->id();
            $table->string('kode_mapel');
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('kode_mapel')->references('kode_mapel')->on('mapel')->onDelete('cascade');
            $table->integer('semester');
            $table->integer('UTS');
            $table->integer('UAS');
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
