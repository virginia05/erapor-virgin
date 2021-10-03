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
            $table->string('nis', 10);
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('mapel')->onDelete('cascade');
            $table->string('tahun_ajaran',10)->nullable();
            $table->decimal('semester', 3,0)->default(1);
            $table->decimal('UTS', 3,0)->default(0);
            $table->decimal('UAS', 3,0)->default(0);
            $table->decimal('pengetahuan', 3,0)->default(0);
            $table->decimal('keterampilan', 3,0)->default(0);
            $table->decimal('sikap', 3,0)->default(0);
            $table->decimal('jumlah', 3,0)->default(0);
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
