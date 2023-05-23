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
        Schema::create('sertifikat_sukets', function (Blueprint $table) {
            $table->id();
            $table->string('id_izin');
            $table->integer('id_sertifikat_suket');
            $table->date('updated')->nullable();
            $table->date('created');
            $table->string('creator');
            $table->string('nama_sertifikat_surket')->nullable();
            $table->string('penerbit')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('file_sertifikat')->nullable();
            $table->timestamps();

            $table->foreign('id_izin')->references('id_izin')->on('personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat_sukets');
    }
};
