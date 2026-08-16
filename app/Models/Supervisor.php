<?php

namespace App\Models;

class Supervisor extends Usuario
{
    // Supervisores usam a mesma tabela; não usam SIAPE por requisito
    protected $fillable = ['Nome', 'Email', 'Senha', 'cpf', 'atribuicao', 'matricula'];
}
