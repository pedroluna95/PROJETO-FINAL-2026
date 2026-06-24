<?php
use Illuminate\Support\Facades\Route;

Route::view ('/home','home');
Route::view ('/login','login');


Route::view ('/cadastro','cadastro');

Route::view('/cadastro/aluno', 'cadastro.aluno');
Route::view('/cadastro/supervisor', 'cadastro.supervisor');
Route::view('/cadastro/orientador', 'cadastro.orientador');
Route::view('/cadastro/contratante', 'cadastro.contratante');


Route::view ('/vagas','vagas');
Route::view ('/inscricoes','inscricoes');
