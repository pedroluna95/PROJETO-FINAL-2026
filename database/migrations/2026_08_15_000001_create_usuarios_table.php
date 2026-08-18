<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('user_ID');
            $table->string('Nome', 60);
            $table->string('Email', 45);
            $table->string('Senha', 255);
            $table->string('atribuicao', 60)->nullable();
            $table->string('cpf', 14)->nullable();
        });

        DB::table('usuarios')->insert([
            'Nome' => 'Administrador',
            'Email' => 'admin@admin.com',
            'Senha' => Hash::make('cefet123'),
            'atribuicao' => 'administrador',
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};