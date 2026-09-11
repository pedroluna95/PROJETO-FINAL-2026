<?php

namespace App\Models;

use App\Services\UsuarioService;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'user_ID';
    public $timestamps = false;
    protected $fillable = ['Nome', 'Email', 'Senha', 'cpf', 'atribuicao', 'matricula', 'siape'];

    public function setCpfAttribute($value): void
    {
        $formatted = UsuarioService::formatCpf($value);
        if ($formatted !== null) $this->attributes['cpf'] = $formatted;
    }
}
