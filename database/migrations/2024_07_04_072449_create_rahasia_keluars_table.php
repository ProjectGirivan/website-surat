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
        Schema::create('rahasia_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('klasifikasi');
            $table->string('lampiran');
            $table->string('hal');
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
        Schema::dropIfExists('rahasia_keluars');
    }
};
