<?php
$_ENV['APP_DEBUG'] = 'true';
putenv('APP_DEBUG=true');

define('LARAVEL_START', microtime(true));
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());
$content = $response->getContent();
if (strpos($content, 'exception') !== false || $response->getStatusCode() >= 400) {
    // busca o trecho legível do erro
    if (preg_match('#<span[^>]*>([^<]{10,400}(?:Exception|Error)[^<]{0,200})</span>#', $content, $m)) {
        echo "ERR1: " . $m[1] . "\n";
    }
    if (preg_match('/([A-Za-z\\\\]+(?:Exception|Error))/', $content, $m)) {
        echo "ERR2: " . $m[1] . "\n";
    }
    // salvar HTML para inspeção
    file_put_contents(__DIR__.'/erro.html', $content);
}
echo "Status: " . $response->getStatusCode() . "\n";
$kernel->terminate($request, $response);
