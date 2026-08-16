<?php

namespace App\Models;

class Contratante extends Usuario
{
    protected $fillable = ['Nome', 'Email', 'Senha', 'cpf', 'atribuicao'];
}
