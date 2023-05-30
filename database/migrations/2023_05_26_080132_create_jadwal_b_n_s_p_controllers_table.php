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
        Schema::create('jadwal_b_n_s_p_controllers', function (Blueprint $table) {
            $table->id();
            $table->string('id_izin')->primary();
            $table->integer('jadwal_id');
            $table->integer('tuk_id');
            $table->integer('asesor_id');
            $table->boolean('is_fg');
            $table->string('nik');
            $table->string('nib');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('jenis_kelamin');
            $table->string('alamat');
            $table->integer('kota_id');
            $table->integer('provinsi_id');
            $table->integer('negara_id');
            $table->string('telepon');
            $table->string('email');
            $table->integer('jenis_mohon');
            $table->integer('skema_id');
            $table->string('keterangan');
            $table->integer('jenjang_id');
            $table->string('prodi');
            $table->string('no_ijazah');
            $table->date('tanggal_ijazah')->nullable();
            $table->string('tahun_lulus');
            $table->integer('kota_sekolah');
            $table->integer('prov_sekolah');
            $table->integer('negara_sekolah');
            $table->string('nama_sekolah');
            $table->integer('pekerjaan');
            $table->string('instansi_pekerjaan');
            $table->string('jabatan_pekerjaan');
            $table->string('file_foto');
            $table->string('file_ktp');
            $table->string('file_ijazah');
            $$table->timestamps();

            $table->foreign('id_izin')->references('id_izin')->on('personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_b_n_s_p_controllers');
    }
};
