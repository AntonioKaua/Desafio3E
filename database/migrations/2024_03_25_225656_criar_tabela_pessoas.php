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
        Schema::create("pessoas", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nome_pessoa");
            $table->string("identificador");
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pessoas");
        Schema::dropIfExists("localizacoes");
    }
};
