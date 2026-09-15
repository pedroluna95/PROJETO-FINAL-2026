<?php

namespace App\Models;

class EmpresasConveniadas extends Usuario
{
    protected $fillable = ['Empresa', 'CNPJ', 'Vigencia Inicial', 'Vigencia Final'];
}
