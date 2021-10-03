<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepribadianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepribadian', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 10);
            $table->string('tahun_ajaran')->nullable();
            $table->integer('semester')->default('1');
            $table->string('nilai_kerajinan')->default('0');
            $table->string('nilai_kelakuan')->default('0');
            $table->string('nilai_kerapihan')->default('0');
            $table->string('catatan')->nullable();
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
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
        Schema::dropIfExists('kepribadian');
    }
}
