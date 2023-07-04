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
        Schema::create('list_permohonans', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('nik')->nullable();
            $table->string('id_izin')->nullable();
            $table->string('id_lsp')->nullable();
            $table->string('created')->nullable();
            $table->string('creator')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_permohonans');
    }
};
