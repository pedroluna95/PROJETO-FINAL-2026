<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    /**
     * Cria ou atualiza um usuário baseado no email.
     * Retorna a instância do usuário criada/atualizada.
     */
    public static function createOrUpdate(array $data): Usuario
    {
        $email = $data['email'] ?? $data['Email'] ?? null;
        $user = null;
        if ($email) {
            $user = Usuario::where('Email', $email)->first();
        }

        $senha = $data['senha'] ?? $data['Senha'] ?? null;
        if ($senha) {
            $senha = Hash::make($senha);
        }

        $attributes = [
            'Nome' => $data['nome'] ?? $data['Nome'] ?? null,
            'Email' => $email,
            'Senha' => $senha,
            'cpf' => $data['cpf'] ?? null,
            'atribuicao' => $data['tipo'] ?? $data['atribuicao'] ?? null,
        ];

        // Remover atributos nulos para não sobrescrever com null em updates
        $attributes = array_filter($attributes, function ($v) {
            return $v !== null;
        });

        if ($user) {
            $user->fill($attributes);
            $user->save();
            return $user;
        }

        return Usuario::create($attributes);
    }
}
