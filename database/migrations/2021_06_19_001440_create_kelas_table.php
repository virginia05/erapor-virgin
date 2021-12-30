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
            $table->integer('kode_rombel')->nullable();
            $table->string('nuptk',16)->nullable();
            $table->string('nama_kelas', 15);
            $table->foreign('nuptk')->references('nuptk')->on('guru')->onDelete('cascade');
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
