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
        Schema::create('b_n_s_p_auths', function (Blueprint $table) {
            $table->id();
            $table->string('host')->nullable();
            $table->string('id_lsp_bnsp')->nullable();
            $table->text('public_token')->nullable();
            $table->text('private_token')->nullable();
            $table->string('x_bnsp_user')->nullable();
            $table->string('x_bnsp_key')->nullable();
            $table->text('x_authorization')->nullable();
            $table->date('expire_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_n_s_p_auths');
    }
};
