<?php

namespace App\Models;

class Aluno extends Usuario
{
    // Usa a mesma tabela `usuarios` herdada de Usuario
    // Define campos específicos que podem ser preenchidos para o tipo Aluno
    protected $fillable = ['Nome', 'Email', 'Senha', 'cpf', 'atribuicao', 'matricula'];
}
