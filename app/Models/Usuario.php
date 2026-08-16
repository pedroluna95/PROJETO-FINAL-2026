<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'user_ID';
    public $timestamps = false;
    protected $fillable = ['Nome', 'Email', 'Senha', 'cpf', 'atribuicao'];
}