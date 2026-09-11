<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    public static function create(array $data): Usuario
    {
        $tipo = strtolower((string) ($data['tipo'] ?? $data['atribuicao'] ?? ''));
        $modelClass = match ($tipo) {
            'aluno' => \App\Models\Aluno::class,
            'orientador' => \App\Models\Orientador::class,
            'supervisor' => \App\Models\Supervisor::class,
            'contratante' => \App\Models\Contratante::class,
            default => Usuario::class,
        };

        return $modelClass::create(self::attributes($data));
    }

    public static function createOrUpdate(array $data): Usuario
    {
        $email = $data['email'] ?? $data['Email'] ?? null;
        $user = $email ? Usuario::where('Email', $email)->first() : null;
        if (! $user) return self::create($data);
        $user->fill(self::attributes($data, false));
        $user->save();
        return $user->fresh();
    }

    private static function attributes(array $data, bool $includePassword = true): array
    {
        $attributes = [
            'Nome' => $data['nome'] ?? $data['Nome'] ?? null,
            'Email' => $data['email'] ?? $data['Email'] ?? null,
            'cpf' => self::formatCpf($data['cpf'] ?? null),
            'atribuicao' => strtolower((string) ($data['tipo'] ?? $data['atribuicao'] ?? '')),
            'matricula' => $data['matricula'] ?? null,
            'siape' => $data['siape'] ?? null,
        ];
        $senha = $data['senha'] ?? $data['Senha'] ?? null;
        if ($includePassword && $senha) $attributes['Senha'] = Hash::make($senha);
        return array_filter($attributes, fn ($value) => $value !== null);
    }

    public static function isValidCpf($value): bool
    {
        $digits = preg_replace('/\D/', '', (string) $value);
        if (strlen($digits) !== 11 || preg_match('/^(\d)\1{10}$/', $digits)) return false;
        for ($length = 9; $length <= 10; $length++) {
            $sum = 0;
            for ($i = 0; $i < $length; $i++) $sum += (int) $digits[$i] * (($length + 1) - $i);
            $check = ($sum * 10) % 11;
            if ($check === 10) $check = 0;
            if ($check !== (int) $digits[$length]) return false;
        }
        return true;
    }

    public static function formatCpf($value): ?string
    {
        $digits = preg_replace('/\D/', '', (string) $value);
        if (! self::isValidCpf($digits)) return null;
        return substr($digits, 0, 3) . '.' . substr($digits, 3, 3) . '.' . substr($digits, 6, 3) . '-' . substr($digits, 9, 2);
    }
}
