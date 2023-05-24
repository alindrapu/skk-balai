<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('klasifikasi_kualifikasis', function (Blueprint $table) {
            $table->string('id_izin');
            $table->id();
            $table->integer('id_klasifikasi_kualifikasi');
            $table->date('updated')->nullable();
            $table->date('created');
            $table->string('creator');
            $table->integer('data_id');
            $table->integer('lsp');
            $table->string('subklasifikasi');
            $table->string('kualifikasi');
            $table->string('jabatan_kerja');
            $table->integer('jenjang');
            $table->integer('asosiasi')->nullable();
            $table->string('tuk')->nullable();
            $table->string('kta')->nullable();
            $table->integer('jenis_permohonan')->nullable();
            $table->string('berita_acara_vv')->nullable();
            $table->text('surat_permohonan')->nullable();
            $table->text('surat_pengantar_pemohonan_asosiasi')->nullable();
            $table->text('sertifikat_skk')->nullable();
            $table->text('self_asesmen_apl')->nullable();
            // $table->string('no_registrasi_asosiasi')->nullable();
            $table->string('klasifikasi');
            // $table->integer('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('id_izin')->references('id_izin')->on('personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi_kualifikasis');
    }
};
