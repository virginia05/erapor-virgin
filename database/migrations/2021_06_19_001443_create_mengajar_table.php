<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMengajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mengajar', function (Blueprint $table) {
            $table->string('id_guru');
            $table->string('kode_mapel');
            $table->string('kode_rombel');
            $table->foreign('id_guru')->references('id_guru')->on('guru')->onDelete('cascade');
            $table->foreign('kode_mapel')->references('kode_mapel')->on('mapel')->onDelete('cascade');
            $table->foreign('kode_rombel')->references('kode_rombel')->on('rombel')->onDelete('cascade');
            
            // $table->foreignId('id_guru')->constrained('guru')->onDelete('cascade');
            // $table->foreignId('kode_mapel')->constrained('mapel')->onDelete('cascade');
            // $table->foreignId('kode_rombel')->constrained('rombel')->onDelete('cascade');

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
        Schema::dropIfExists('mengajar');
    }
}
