<?php

use Core\Router; // Importa a classe Router do namespace Core para gerenciar as rotas da aplicação.

require_once __DIR__ . '/../vendor/autoload.php'; // Inclui o autoloader do Composer para carregar automaticamente as classes.

$router = new Router(); // Instancia o roteador para processar as requisições.
$router->run(); // Executa o roteador, que irá despachar a requisição para o controlador e método apropriados.

?>