<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atribuicoes', function (Blueprint $table) {
            $table->integer('Atribuicao_ID')->primary();
            $table->string('Nome_atribuicao', 45);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atribuicoes');
    }
};