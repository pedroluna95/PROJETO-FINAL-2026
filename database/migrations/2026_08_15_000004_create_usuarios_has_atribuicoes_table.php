<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios_has_atribuicoes', function (Blueprint $table) {
            $table->unsignedInteger('User_ID');
            $table->integer('Atribuicoes_ID');

            $table->primary(['User_ID', 'Atribuicoes_ID']);

            $table->foreign('User_ID')
                ->references('user_ID')
                ->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Atribuicoes_ID')
                ->references('Atribuicao_ID')
                ->on('atribuicoes')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios_has_atribuicoes');
    }
};