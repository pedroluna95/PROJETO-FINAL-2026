<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UsuarioController;

// Rota raiz para HOME
Route::redirect('/', '/home');

Route::view ('/home','home');
Route::view ('/login','login');

Route::post('/login', function (Request $request) {
	$data = $request->validate([
		'email' => 'required|email',
		'senha' => 'required|string',
	]);

	$user = Usuario::where('Email', $data['email'])->first();

	// hash check para comparar a senha fornecida com a senha armazenada
	if (! $user || ! Hash::check($data['senha'], $user->Senha)) { 
		return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
	}

	$request->session()->put('usuario_id', $user->user_ID);
	$request->session()->put('usuario_nome', $user->Nome);

	// padronizar chave de tipo usada nas views
	$request->session()->put('user_type', $user->atribuicao ?? 'aluno');

	// chaves compatíveis com views existentes
	$request->session()->put('user_id', $user->user_ID); 
	$request->session()->put('user_name', $user->Nome);
	$request->session()->put('user_email', $user->Email);
	$request->session()->put('user_cpf', $user->cpf ?? 'CPF não cadastrado');
	$request->session()->put('user_matricula', $user->matricula ?? '');
	$request->session()->put('user_siape', $user->siape ?? '');

	// redirecionar para dashboard após login
	return redirect('/dashboard');
});


Route::view ('/cadastro','cadastro');

Route::post('/cadastro', function (Request $request) {
	$tipo = $request->input('tipo');

	//restrições de validação para matrícula e siape dependendo do tipo de usuário
	$data = $request->validate([
		'nome' => 'required|string|max:60',
		'email' => 'required|email',
		'cpf' => 'required|digits:11',
		'senha' => 'required|min:6',
		'tipo' => 'required|string',
		'matricula' => $tipo === 'aluno' ? 'required|string' : 'nullable|string',
		'siape' => $tipo === 'orientador' ? 'required|digits:8' : 'nullable|string',
	]);

	// A confirmação de senha no formulário é 'confirmar_senha'
	if ($request->input('senha') !== $request->input('confirmar_senha')) {
		return back()->withErrors(['senha' => 'As senhas não coincidem'])->withInput();
	}

	$data = $request->only(['nome','email','cpf','senha','tipo','matricula','siape']);

	// assegurar email único
	if (\App\Models\Usuario::where('Email', $data['email'])->exists()) {
		return back()->withErrors(['email' => 'Email já cadastrado'])->withInput();
	}

	UsuarioService::create($data);

	return redirect('/login')->with('success', 'Conta criada com sucesso');
});


// Cada rota de cadastro específica para cada tipo de usuário, que no bd será armazenado automaticamente no campo "atribuicao" da tabela usuarios
Route::view('/cadastro/aluno', 'cadastro');
Route::view('/cadastro/supervisor', 'cadastro');
Route::view('/cadastro/orientador', 'cadastro');
Route::view('/cadastro/contratante', 'cadastro');


//dashboard para o aluno
Route::view('/aluno', 'dashboard');
Route::view('/controle-horas', 'controle-horas');
Route::view('/tutorial', 'tutorial');
Route::view('/perfil', 'perfil');
Route::view('/empresas', 'empresas');


//views de vagas e inscrições
Route::view ('/vagas','vagas');
Route::view ('/vagas/{id}', 'vaga-detalhe');
Route::view ('/inscricoes','vagas');


// Rotas de dashboard e perfil
Route::get('/dashboard', function (Request $request) {
	$usuarioId = $request->session()->get('usuario_id');
	if ($usuarioId) {
		$user = Usuario::find($usuarioId);
		if ($user) {
			if (! $request->session()->has('user_type')) {
				$request->session()->put('user_type', $user->atribuicao ?? 'aluno');
			}
			if (! $request->session()->has('user_email')) {
				$request->session()->put('user_email', $user->Email);
			}
			if (! $request->session()->has('user_cpf')) {
				$request->session()->put('user_cpf', $user->cpf ?? 'CPF não cadastrado');
			}
			if (! $request->session()->has('user_matricula')) {
				$request->session()->put('user_matricula', $user->matricula ?? '');
			}
			if (! $request->session()->has('user_siape')) {
				$request->session()->put('user_siape', $user->siape ?? '');
			}
			if (! $request->session()->has('user_name')) {
				$request->session()->put('user_name', $user->Nome);
			}
		}
	}
	// fornecer estatísticas simples para as views (ex.: total de usuários no dashboard admin)
	$total_usuarios = \App\Models\Usuario::count();
	return view('dashboard', ['total_usuarios' => $total_usuarios]);
});


// Rotas administrativas protegidas — apenas administradores
Route::prefix('admin')->middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
	// Views de gerenciamento
	Route::get('usuarios', function () { return view('admin.usuarios.index'); });
	Route::get('usuarios/create', function () { return view('admin.usuarios.create'); });
	Route::get('usuarios/{id}/edit', function () { return view('admin.usuarios.edit'); });

	// Visualizador de tabelas
	Route::get('tables', function () { return view('admin.tables.index'); });
	Route::get('api/tables', [\App\Http\Controllers\TablesController::class, 'listTables']);
	Route::get('api/tables/{table}', [\App\Http\Controllers\TablesController::class, 'rows']);

	// API para usuários (separado das views)
	Route::get('api/usuarios', [UsuarioController::class, 'index']);
	Route::post('api/usuarios', [UsuarioController::class, 'store']);
	Route::get('api/usuarios/{id}', [UsuarioController::class, 'show']);
	Route::put('api/usuarios/{id}', [UsuarioController::class, 'update']);
	Route::delete('api/usuarios/{id}', [UsuarioController::class, 'destroy']);
});


// Rota de logout
Route::get('/logout', function (Request $request) {
	$request->session()->flush();
	return redirect('/login');
});
