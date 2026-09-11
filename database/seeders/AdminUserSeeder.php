<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['Email' => 'admin@cefet-rj.br'],
            [
                'Nome' => 'Administrador',
                'Senha' => Hash::make('cefet123'),
                'atribuicao' => 'administrador',
                'cpf' => null,
                'matricula' => null,
                'siape' => null,
            ]
        );
    }
}
