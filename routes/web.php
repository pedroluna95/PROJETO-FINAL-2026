<?php
use Illuminate\Support\Facades\Route;

// Rota raiz redireciona para home
Route::redirect('/', '/home');

Route::view ('/home','home');
Route::view ('/login','login');


Route::view ('/cadastro','cadastro');

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
Route::view('/logout', 'login');
