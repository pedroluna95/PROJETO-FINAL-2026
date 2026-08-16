<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

// Rota raiz redireciona para home
Route::redirect('/', '/home');

Route::view ('/home','home');
Route::view ('/login','login');

Route::post('/login', function (Request $request) {
	$data = $request->validate([
		'email' => 'required|email',
		'senha' => 'required|string',
	]);

	$user = Usuario::where('Email', $data['email'])->first();
	if (! $user || ! Hash::check($data['senha'], $user->Senha)) {
		return back()->withErrors(['email' => 'Credenciais inválidas'])->withInput();
	}

	$request->session()->put('usuario_id', $user->user_ID);
	$request->session()->put('usuario_nome', $user->Nome);

	return redirect('/dashboard');
});


Route::view ('/cadastro','cadastro');

Route::post('/cadastro', function (Request $request) {
	$data = $request->validate([
		'nome' => 'required|string|max:60',
		'email' => 'required|email',
		'cpf' => 'required|string',
		'senha' => 'required|min:6',
		'tipo' => 'required|string',
	]);

	// A confirmação de senha no formulário é 'confirmar_senha'
	if ($request->input('senha') !== $request->input('confirmar_senha')) {
		return back()->withErrors(['senha' => 'As senhas não coincidem'])->withInput();
	}

	UsuarioService::createOrUpdate($request->all());

	return redirect('/login')->with('success', 'Conta criada/atualizada com sucesso');
});

Route::view('/cadastro/aluno', 'cadastro');
Route::view('/cadastro/supervisor', 'cadastro');
Route::view('/cadastro/orientador', 'cadastro');
Route::view('/cadastro/contratante', 'cadastro');


Route::view ('/vagas','vagas');
Route::view ('/vagas/{id}', 'vaga-detalhe');
Route::view ('/inscricoes','vagas');

// Área interna (design do Figma — dashboards por perfil)
Route::view('/dashboard', 'dashboard');
Route::view('/aluno', 'dashboard');
Route::view('/controle-horas', 'controle-horas');
Route::view('/tutorial', 'tutorial');
Route::view('/perfil', 'perfil');
Route::view('/empresas', 'empresas');
Route::get('/logout', function (Request $request) {
	$request->session()->flush();
	return redirect('/login');
});
