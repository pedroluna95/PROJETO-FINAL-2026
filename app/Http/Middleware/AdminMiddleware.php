<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminMiddleware
{
    /**
     * Verifica se o usuário autenticado na sessão é administrador.
     */
    public function handle(Request $request, Closure $next)
    {
        $usuarioId = $request->session()->get('usuario_id');
        if (! $usuarioId) {
            return redirect('/login');
        }

        $user = Usuario::find($usuarioId);
        if (! $user) {
            return redirect('/login');
        }

        // garantir que a sessão tenha o tipo de usuário e dados para uso nas views
        if (! $request->session()->has('user_type')) {
            $request->session()->put('user_type', $user->atribuicao ?? 'aluno');
        }
        if (! $request->session()->has('user_id')) {
            $request->session()->put('user_id', $user->user_ID);
        }
        if (! $request->session()->has('user_name')) {
            $request->session()->put('user_name', $user->Nome);
        }

        if (strtolower($user->atribuicao) !== 'administrador') {
            abort(403, 'Acesso negado: apenas administradores.');
        }

        return $next($request);
    }
}
