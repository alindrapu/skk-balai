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
        Schema::create('master_kabupaten', function (Blueprint $table) {
            $table->id();
            $table->string("id_propinsi_bps");
            $table->string("nama_kabupaten_bps");
            $table->string("kode_kabupaten_bps");
            $table->string("id_propinsi_dagri");
            $table->string("nama_kabupaten_dagri");
            $table->string("kode_kabupaten_dagri");
            $table->string("cek");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MasterKabupaten');
    }
};
