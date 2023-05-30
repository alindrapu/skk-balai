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
        Schema::create('master_jabatan_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('lsp_id_klasifikasi');
            $table->integer('id_klasifikasi_bnsp');
            $table->string('klasifikasi');
            $table->string('klasifikasi_en');
            $table->string('lsp_sub_klasifikasi_id');
            $table->integer('id_sub_klasifikasi_bnsp');
            $table->string('subklasifikasi');
            $table->string('subklasifikasi_en');
            $table->string('lsp_kualifikasi_id');
            $table->string('kualifikasi');
            $table->string('kualifikasi_en');
            $table->string('id_jabker');
            $table->string('id_jabatan_kerja');
            $table->string('id_data_skema_bnsp');
            $table->string('jabatan_kerja');
            $table->string('work_position');
            $table->integer('jenjang_id');
            $table->string('acuan');
            $table->string('kbli');
            $table->string('kbji');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_jabatan_kerja');
    }
};
