<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Services\UsuarioService;
use Illuminate\Support\Facades\Hash;

class UsuarioController
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $tipo = strtolower((string) $request->query('tipo', ''));

        $query = Usuario::query();

        if ($tipo !== '') {
            $query->where('atribuicao', $tipo);
        }

        if ($q !== '') {
            $query->where(function($qb) use ($q) {
                $qb->where('Nome', 'like', "%{$q}%")
                   ->orWhere('Email', 'like', "%{$q}%")
                   ->orWhere('cpf', 'like', "%{$q}%")
                   ->orWhere('atribuicao', 'like', "%{$q}%")
                   ->orWhere('matricula', 'like', "%{$q}%")
                   ->orWhere('siape', 'like', "%{$q}%");
            });
        }

        $usuarios = $query->orderBy('user_ID', 'desc')->get();
        return response()->json($usuarios);
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (! $usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        $tipo = strtolower((string) ($request->input('tipo') ?? ''));
        if ($tipo === 'administrador') {
            return response()->json(['message' => 'O administrador já possui login base no banco de dados.'], 422);
        }

        $data = $request->validate([
            'nome' => 'required|string|max:60',
            'email' => 'required|email',
            'senha' => 'required|string|min:6',
            'cpf' => 'nullable|digits:11',
            'tipo' => 'nullable|string',
            'matricula' => 'nullable|string',
            'siape' => 'nullable|digits:8',
        ]);

        $usuario = UsuarioService::createOrUpdate($data);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (! $usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $tipo = strtolower((string) ($request->input('tipo') ?? $usuario->atribuicao ?? ''));
        if ($tipo === 'administrador') {
            return response()->json(['message' => 'O administrador já possui login base no banco de dados.'], 422);
        }

        $request->validate([
            'nome' => 'sometimes|required|string|max:60',
            'email' => 'sometimes|required|email',
            'senha' => 'sometimes|nullable|string|min:6',
            'cpf' => 'sometimes|nullable|digits:11',
            'tipo' => 'sometimes|nullable|string',
            'matricula' => 'sometimes|nullable|string',
            'siape' => 'sometimes|nullable|digits:8',
        ]);

        $data = $request->only(['nome','email','senha','cpf','tipo','atribuicao','matricula','siape']);
        if (! empty($data['senha'])) {
            $data['senha'] = Hash::make($data['senha']);
        }

        // mapear chaves para o serviço
        $payload = [
            'nome' => $data['nome'] ?? $usuario->Nome,
            'email' => $data['email'] ?? $usuario->Email,
            'Senha' => $data['senha'] ?? $usuario->Senha,
            'cpf' => isset($data['cpf']) ? (\App\Services\UsuarioService::formatCpf($data['cpf']) ?? $usuario->cpf) : $usuario->cpf,
            'atribuicao' => $data['tipo'] ?? $data['atribuicao'] ?? $usuario->atribuicao,
            'matricula' => $data['matricula'] ?? $usuario->matricula ?? null,
            'siape' => $data['siape'] ?? $usuario->siape ?? null,
        ];

        $usuario->fill(array_filter($payload, function ($v) { return $v !== null; }));
        $usuario->save();

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (! $usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        $usuario->delete();
        return response()->json(['message' => 'Usuário excluído']);
    }
}
