<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->string('id_izin');
            $table->increments('id');
            $table->string('id_pendidikan');
            $table->string('updated');
            $table->string('created');
            $table->string('creator');
            $table->integer('data_id');
            $table->string('nama_sekolah_perguruan_tinggi');
            $table->string('program_studi');
            $table->string('no_ijazah');
            $table->string('tahun_lulus');
            $table->string('jenjang');
            $table->string('alamat');
            $table->string('negara');
            $table->string('propinsi');
            $table->string('kabupaten');
            $table->string('scan_ijazah_legalisir')->nullable();
            $table->string('scan_surat_keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_izin')->references('id_izin')->on('personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikans');
    }
};
