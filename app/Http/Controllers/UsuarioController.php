<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController
{
    private const TIPOS = ['aluno', 'orientador', 'supervisor', 'contratante'];

    public function index(Request $request)
    {
        $query = Usuario::query();
        if ($tipo = strtolower(trim((string) $request->query('tipo')))) $query->where('atribuicao', $tipo);
        if ($q = trim((string) $request->query('q'))) {
            $query->where(fn ($qb) => $qb->where('Nome', 'like', "%{$q}%")
                ->orWhere('Email', 'like', "%{$q}%")->orWhere('cpf', 'like', "%{$q}%")
                ->orWhere('atribuicao', 'like', "%{$q}%")->orWhere('matricula', 'like', "%{$q}%")
                ->orWhere('siape', 'like', "%{$q}%"));
        }
        return response()->json($query->orderByDesc('user_ID')->get());
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        return $usuario ? response()->json($usuario) : $this->error('Usuário não encontrado.', 404);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        if ($data['tipo'] === 'administrador') return $this->error('Não é permitido criar outro administrador por esta tela.', 422);
        try { $usuario = UsuarioService::create($data); }
        catch (\Throwable $e) { return $this->error('Não foi possível salvar o usuário.', 500, $e); }
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (! $usuario) return $this->error('Usuário não encontrado.', 404);
        if (strtolower((string) $usuario->atribuicao) === 'administrador') return $this->error('A conta administrativa não pode ser editada por esta tela.', 422);

        $data = $request->validate([
            'nome' => ['sometimes', 'required', 'string', 'max:60'],
            'email' => ['sometimes', 'required', 'email', 'max:45', Rule::unique('usuarios', 'Email')->ignore($usuario->user_ID, 'user_ID')],
            'senha' => ['sometimes', 'nullable', 'string', 'min:6'],
            'cpf' => ['sometimes', 'nullable', 'string', 'cpf_valido'],
            'tipo' => ['sometimes', 'required', Rule::in(self::TIPOS)],
            'matricula' => ['sometimes', 'nullable', 'string', 'max:60'],
            'siape' => ['sometimes', 'nullable', 'digits:8'],
        ]);
        $tipo = strtolower((string) ($data['tipo'] ?? $usuario->atribuicao));
        if ($tipo === 'aluno' && array_key_exists('tipo', $data) && blank($data['matricula'] ?? $usuario->matricula)) return $this->error('Matrícula é obrigatória para alunos.', 422, null, ['matricula' => ['Informe a matrícula.']]);
        if ($tipo === 'orientador' && array_key_exists('tipo', $data) && blank($data['siape'] ?? $usuario->siape)) return $this->error('SIAPE é obrigatório para orientadores.', 422, null, ['siape' => ['Informe o SIAPE de 8 dígitos.']]);

        foreach (['nome' => 'Nome', 'email' => 'Email', 'tipo' => 'atribuicao'] as $input => $column) if (array_key_exists($input, $data)) $usuario->{$column} = $data[$input];
        foreach (['cpf', 'matricula', 'siape'] as $field) if (array_key_exists($field, $data)) $usuario->{$field} = $field === 'cpf' ? UsuarioService::formatCpf($data[$field]) : $data[$field];
        if (! empty($data['senha'])) $usuario->Senha = Hash::make($data['senha']);
        $usuario->save();
        return response()->json($usuario->fresh());
    }

    public function destroy(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (! $usuario) return $this->error('Usuário não encontrado.', 404);
        if ((int) $request->session()->get('usuario_id') === (int) $usuario->user_ID) return $this->error('Não é permitido excluir a própria conta.', 422);
        if ($usuario->atribuicao === 'administrador' && Usuario::where('atribuicao', 'administrador')->count() <= 1) return $this->error('Não é permitido excluir o último administrador.', 422);
        $usuario->delete();
        return response()->json(['message' => 'Usuário excluído.']);
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email', 'max:45', 'unique:usuarios,Email'],
            'senha' => ['required', 'string', 'min:6'],
            'cpf' => ['required', 'string', 'cpf_valido'],
            'tipo' => ['required', Rule::in(self::TIPOS)],
            'matricula' => ['nullable', 'string', 'max:60'],
            'siape' => ['nullable', 'digits:8'],
        ]);
        if ($data['tipo'] === 'aluno' && blank($data['matricula'])) $request->validate(['matricula' => ['required', 'string']]);
        if ($data['tipo'] === 'orientador' && blank($data['siape'])) $request->validate(['siape' => ['required', 'digits:8']]);
        return $data;
    }

    private function error(string $message, int $status, ?\Throwable $exception = null, array $errors = [])
    {
        $requestId = (string) str()->uuid();
        if ($exception) \Log::error($message, ['request_id' => $requestId, 'exception' => $exception]);
        return response()->json(['message' => $message, 'errors' => $errors, 'request_id' => $requestId], $status);
    }
}
