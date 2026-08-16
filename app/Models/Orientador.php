<?php

namespace App\Models;

class Orientador extends Usuario
{
    // Usa a mesma tabela `usuarios` herdada de Usuario
    // Define campos específicos que podem ser preenchidos para o tipo Orientador
    protected $fillable = ['Nome', 'Email', 'Senha', 'cpf', 'atribuicao', 'siape'];
}
