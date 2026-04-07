<?php
namespace Core; 

class Router { 

    public function run() { 

        $url = isset($_GET['url']) ? $_GET['url'] : 'home'; // pega a URL da requisição. Se não houver, define 'home' como padrão
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL); 

        $parts = explode('/', $url); // Divide a URL em segmentos (ex: controller/method/param)
        $controllerName = ucfirst(array_shift($parts)) . 'Controller'; //Modifica a url dividida em segmentos para o nome do controller
        $methodName = array_shift($parts) ?: 'index'; 

        $controllerClass = "App\\Controllers\\$controllerName"; // Constrói o nome completo da classe do controlador, incluindo o namespace.

        if (class_exists($controllerClass)) { // Verifica se a classe do controlador existe
            $controller = new $controllerClass();

                if (method_exists($controller, $methodName)) { // Verifica se o método existe no controlador.
                    call_user_func_array([$controller, $methodName], $parts); // Chama o método do controlador, passando os parâmetros da URL.
                } 

                else {
                    http_response_code(404); 
                    echo "Método '$methodName' não encontrado no controlador '$controllerName'.";
                }
        } 
        
        else {
            http_response_code(404); // Define o status HTTP para 404 (Não Encontrado).
            echo "Controlador '$controllerName' não encontrado."; // Exibe uma mensagem de erro para o usuário.
        }
    }
}