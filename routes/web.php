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
Route::view ('/inscricoes','inscricoes');
