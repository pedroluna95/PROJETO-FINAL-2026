<?php
namespace Core; // Define o namespace para a classe Router.

class Router { // A classe Router é responsável por analisar a URL e despachar a requisição para o controlador e método corretos.
    public function run() { // O método run inicia o processo de roteamento.
        $url = isset($_GET['url']) ? $_GET['url'] : 'home'; // Obtém a URL da requisição. Se não houver, define 'home' como padrão.
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL); 

        $parts = explode('/', $url); // Divide a URL em segmentos (ex: controller/method/param).
        $controllerName = ucfirst(array_shift($parts)) . 'Controller'; 
        $methodName = array_shift($parts) ?: 'index'; 

        $controllerClass = "App\\Controllers\\$controllerName"; // Constrói o nome completo da classe do controlador, incluindo o namespace.

        if (class_exists($controllerClass)) { // Verifica se a classe do controlador existe antes de tentar instanciá-la.
            $controller = new $controllerClass(); // Cria uma nova instância do controlador.

            if (method_exists($controller, $methodName)) { // Verifica se o método solicitado existe no controlador.
                call_user_func_array([$controller, $methodName], $parts); // Chama o método do controlador, passando os segmentos restantes da URL como parâmetros.
            } else {
                http_response_code(404); // Define o status HTTP para 404 (Não Encontrado).
                echo "Método '$methodName' não encontrado no controlador '$controllerName'."; // Exibe uma mensagem de erro para o usuário.
            }
        } else {
            http_response_code(404); // Define o status HTTP para 404 (Não Encontrado).
            echo "Controlador '$controllerName' não encontrado."; // Exibe uma mensagem de erro para o usuário.
        }
    }
}