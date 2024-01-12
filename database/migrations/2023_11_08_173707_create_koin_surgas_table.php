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
        Schema::create('koin_surgas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('catatan');
            $table->string('tanggal');
            $table->string('pukul');
            $table->string('jenis_permintaan');
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
        Schema::dropIfExists('koin_surgas');
    }
};
