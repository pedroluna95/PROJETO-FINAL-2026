<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['Email' => 'admin@cefet-rj.br'],
            [
                'Nome' => 'Administrador',
                'Senha' => Hash::make('cefet123'),
                'atribuicao' => 'administrador',
                'cpf' => '000.000.000-00',
                'matricula' => null,
                'siape' => null,
            ]
        );
    }
}
