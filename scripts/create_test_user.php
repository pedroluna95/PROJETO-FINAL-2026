<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\UsuarioService;

try {
    $user = UsuarioService::create([
        'nome' => 'Script Test',
        'email' => 'script-test+' . time() . '@example.com',
        'cpf' => '12345678901',
        'senha' => 'secret123',
        'tipo' => 'aluno',
        'matricula' => '999'
    ]);
    echo "OK\n";
    print_r($user->toArray());
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
