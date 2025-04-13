<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesiDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesi_data', function (Blueprint $table) {

            $table->id();
            $table->uuid('id_asesi_group')->nullable();
            // $table->foreignId('group_id')->constrained('asesi_group')->onDelete('cascade');
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_tempat_bekerja')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('nik')->nullable()->unique();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki')->comment('L for Laki-laki, P for Perempuan');
            $table->string('alamat_tempat_tinggal')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('jabatan_pekerjaan')->nullable();
            $table->string('skema_sertifikasi')->nullable();
            $table->string('rencana_uji_kompetensi')->nullable();
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
        Schema::dropIfExists('asesi_data');
    }
}
