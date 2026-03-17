<?php

namespace App\Controllers; // Define o namespace para a classe HomeController.

class HomeController { // O HomeController é responsável por gerenciar a lógica da página inicial.
    public function index() { // O método index é o ponto de entrada para a página inicial.
           require_once __DIR__ . '/../Views/home.php'; // Inclui a view home.php para exibir o conteúdo da página inicial.
        }
}
