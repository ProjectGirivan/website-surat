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
        Schema::create('sic_kels', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nrp')->unique();
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('kesatuan');
            $table->string('diberi_izin_oleh');
            $table->string('jenis_cuti');
            $table->string('lama_cuti');
            $table->date('mulai_tanggal');
            $table->date('sd_tanggal');
            $table->string('pergi_dari');
            $table->string('tujuan_ke');
            $table->string('transportasi');
            $table->string('pengikut')->nullable();
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
        Schema::dropIfExists('sic_kels');
    }
};
