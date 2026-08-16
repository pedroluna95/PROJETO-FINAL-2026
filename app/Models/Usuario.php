<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\UsuarioService;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'user_ID';
    public $timestamps = false;
    protected $fillable = ['Nome', 'Email', 'Senha', 'cpf', 'atribuicao', 'matricula', 'siape'];

    /**
     * Mutator: garante que o CPF seja salvo no formato 000.000.000-00.
     * Não sobrescreve um CPF já presente (cpf não pode ser alterado).
     */
    public function setCpfAttribute($value)
    {
        // Se já existe um CPF salvo, não sobrescrever
        if (! empty($this->attributes['cpf'])) {
            return;
        }

        $formatted = UsuarioService::formatCpf($value);
        if ($formatted !== null) {
            $this->attributes['cpf'] = $formatted;
        }
    }
}