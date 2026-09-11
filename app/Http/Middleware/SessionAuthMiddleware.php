<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use Closure;
use Illuminate\Http\Request;

class SessionAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $id = $request->session()->get('usuario_id');
        if (! $id || ! Usuario::find($id)) {
            return redirect()->route('login')->withErrors(['email' => 'Faça login para continuar.']);
        }

        return $next($request);
    }
}
