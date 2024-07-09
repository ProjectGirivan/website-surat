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
        Schema::create('sij_kels', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nrp')->unique();
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('pengikut')->nullable();
            $table->string('pergi_dari');
            $table->string('tujuan_ke');
            $table->string('keperluan');
            $table->string('berkendaraan');
            $table->date('berangkat_tanggal');
            $table->date('kembali_tanggal');
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('sij_kels');
    }
};
