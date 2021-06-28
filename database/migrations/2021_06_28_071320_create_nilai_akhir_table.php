<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAkhirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_akhir', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('id_guru');
            $table->string('kode_mapel');
            $table->bigInteger('id_pengetahuan')->unsigned();
            $table->string('keterampilan');
            $table->string('sikap_spiritual_sosial');
            $table->string('catatan');
            $table->string('tahun');
            $table->foreign('id_pengetahuan')->references('id')->on('pengetahuan')->onDelete('cascade');
            $table->foreign('id_guru')->references('id_guru')->on('guru')->onDelete('cascade');
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('kode_mapel')->references('kode_mapel')->on('mapel')->onDelete('cascade');
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
        Schema::dropIfExists('nilai_akhir');
    }
}
