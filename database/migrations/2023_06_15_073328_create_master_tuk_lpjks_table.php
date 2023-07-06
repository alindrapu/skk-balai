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
        // Schema::create('master_tuk_lpjks', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('id_lsp')->nullable();
        //     $table->text('kode')->nullable();
        //     $table->integer('jenis_tuk')->nullable();
        //     $table->text('nama_tuk')->nullable();
        //     $table->text('alamat')->nullable();
        //     $table->string('telp')->nullable();
        //     $table->string('hp')->nullable();
        //     $table->string('fax')->nullable();
        //     $table->string('email')->nullable();
        //     $table->text('keterangan')->nullable();
        //     $table->string('id_propinsi')->nullable();
        //     $table->string('id_kota')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('master_tuk_lpjks');
    }
};
