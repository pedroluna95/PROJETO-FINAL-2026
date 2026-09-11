<?php

namespace App\Providers;

use App\Services\UsuarioService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Validator::extend('cpf_valido', fn ($attribute, $value) => UsuarioService::isValidCpf($value));
    }
}
