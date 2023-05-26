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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_izin');
            $table->integer('id_proyek');
            $table->date('updated')->nullable();
            $table->date('created')->nullable();
            $table->string('creator')->nullable();
            $table->integer('data_id');
            $table->string('nama_proyek');
            $table->string('lokasi_proyek');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('jabatan');
            $table->string('nilai_proyek');
            $table->text('surat_referensi');
            $table->string('jenis_pengalaman');
            $table->string('pemberi_kerja');
            $table->string('nik');
            $table->string('no_registrasi')->nullable();
            $table->timestamps();

            $table->foreign('id_izin')->references('id_izin')->on('personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
