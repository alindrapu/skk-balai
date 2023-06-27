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
        Schema::create('master_api_sikis', function (Blueprint $table) {
            $table->string('id_lsp')->nullable();
            $table->string('no_lisensi')->nullable();
            $table->string('lisensi')->nullable();
            $table->string('username')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_api_sikis');
    }
};
