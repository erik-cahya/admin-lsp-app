<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPermohonanBlankoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_permohonan_blanko', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('nama_surat');
            $table->integer('kompeten_anggaran_bnsp');
            $table->integer('kompeten_anggaran_kementrian');
            $table->integer('kompeten_anggaran_mandiri');
            $table->integer('kompeten_rcc');
            $table->integer('belum_kompeten');
            $table->string('tanggal_surat');
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
        Schema::dropIfExists('surat_permohonan_blanko');
    }
}
