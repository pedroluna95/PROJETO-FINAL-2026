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
            'cpf' => isset($data['cpf']) ? self::formatCpf($data['cpf']) : null,
            'atribuicao' => $data['tipo'] ?? $data['atribuicao'] ?? null,
            'matricula' => $data['matricula'] ?? null,
            'siape' => $data['siape'] ?? null,
        ];

        // Decide which concrete model class to use based on atribuição/tipo
        $tipo = strtolower((string) ($data['tipo'] ?? $data['atribuicao'] ?? $attributes['atribuicao'] ?? ''));
        switch ($tipo) {
            case 'aluno':
                $modelClass = \App\Models\Aluno::class;
                break;
            case 'orientador':
                $modelClass = \App\Models\Orientador::class;
                break;
            case 'supervisor':
                $modelClass = \App\Models\Supervisor::class;
                break;
            case 'contratante':
                $modelClass = \App\Models\Contratante::class;
                break;
            case 'administrador':
                $modelClass = \App\Models\Administrador::class;
                break;
            default:
                $modelClass = Usuario::class;
        }

        // Remover atributos nulos para não sobrescrever com null em updates
        $attributes = array_filter($attributes, function ($v) {
            return $v !== null;
        });

        if ($user) {
            $user->fill($attributes);
            $user->save();

            // If the stored atribuição implies a different subclass, re-fetch as that class so returned instance matches type
            if (isset($modelClass) && get_class($user) !== $modelClass) {
                $reloaded = $modelClass::find($user->user_ID);
                if ($reloaded) return $reloaded;
            }

            return $user->fresh();
        }

        // Create using the concrete model class so we return the appropriate subclass instance
        return $modelClass::create($attributes);
    }

    /**
     * Formata um CPF para o padrão 000.000.000-00.
     * Aceita entrada com ou sem pontuação. Retorna null se inválido/empty.
     */
    public static function formatCpf($value): ?string
    {
        if (! $value) return null;
        $digits = preg_replace('/\D/', '', $value);
        if (strlen($digits) !== 11) return null;
        return substr($digits,0,3) . '.' . substr($digits,3,3) . '.' . substr($digits,6,3) . '-' . substr($digits,9,2);
    }

}
