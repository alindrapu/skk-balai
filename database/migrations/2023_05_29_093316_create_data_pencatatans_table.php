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
        Schema::create('data_pencatatans', function (Blueprint $table) {
            $table->string('nomor_sertifikasi');
            $table->string('id_izin')->foreign();
            $table->string('nik');
            $table->string('nama');
            $table->string('id_propinsi');
            $table->string('propinsi');
            $table->string('id_kabupaten');
            $table->string('kabupaten');
            $table->string('id_kualifikasi');
            $table->string('kualifikasi');
            $table->string('kualifikasi_en');
            $table->string('id_klasifikasi');
            $table->string('id_subklasifikasi');
            $table->string('subklasifikasi');
            $table->string('subklasifikasi_en');
            $table->string('id_jabatan_kerja');
            $table->string('jabatan_kerja');
            $table->string('jabatan_kerja_en');
            $table->string('jenjang');
            $table->string('nomor_sertifikat_lengkap');
            $table->string('nomor_registrasi_lsp');
            $table->string('nomor_registrasi_lpjk');
            $table->string('nomor_blangko_bnsp');
            $table->date('tanggal_ditetapkan');
            $table->date('tanggal_masa_berlaku');
            $table->string('jenis_permohonan');
            $table->string('qr');
            $table->string('qr_signature');
            $table->string('link_e_sertifikat');
            $table->text('catatan');
            $table->string('ketua_pelaksana');
            $table->string('ttd_ketua_pelaksana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pencatatans');
    }
};
