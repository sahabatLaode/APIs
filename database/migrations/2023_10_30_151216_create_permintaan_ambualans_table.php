<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_ambualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('nama_pemesan');
            $table->int('berat_badan');
            $table->string('level_darurat');
            $table->datetime('tanggal');
            $table->string('pukul');
            $table->geometry('titik_jemput');
            $table->geometry('titik_antar');
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
        Schema::dropIfExists('permintaan_ambualans');
    }
};
