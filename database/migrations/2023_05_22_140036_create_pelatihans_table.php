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
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_izin');
            $table->integer('data_id')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('nama_pelatihan')->nullable();
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->integer('jumlah_jp')->nullable();
            $table->integer('jumlah_hari');
            $table->text('file_sertifikat')->nullable();
            $table->date('updated')->nullable();
            $table->date('created')->nullable();
            $table->string('creator')->nullable();
            $table->timestamps();

            $table->foreign('id_izin')->references('id_izin')->on('personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihans');
    }
};
