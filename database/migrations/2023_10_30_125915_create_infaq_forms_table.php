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
        Schema::create('infaq_forms', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_donasi', 100);
            $table->string('nominal', 100);
            $table->string('nama', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
<<<<<<< HEAD
            // $table->string('fotoInfaq')->nullable;
=======
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
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
        Schema::dropIfExists('infaq_forms');
    }
};
