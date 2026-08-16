<?php
require __DIR__ . '/../app/Services/UsuarioService.php';
use App\Services\UsuarioService;

$tests = [
    '12345678910',
    '123.456.789-10',
    '',
    'abc12345678910',
    '00000000000'
];

foreach ($tests as $t) {
    $f = UsuarioService::formatCpf($t);
    echo "Input: $t => Output: " . ($f ?? 'null') . PHP_EOL;
}
