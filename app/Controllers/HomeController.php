<?php

namespace App\Controllers;

class HomeController {
    
    // Método auxiliar para renderizar as views com cabeçalho e rodapé
    private function render($viewName) {
        require_once __DIR__ . '/../Views/header.php';
        require_once __DIR__ . '/../Views/'. $viewName . '.php';
        require_once __DIR__ . '/../Views/footer.php';
    }

    public function index() {
        $this->render('home');
    }

    public function cadastro() {
        $this->render('cadastro');
    }

    public function login() {
        $this->render('login');
    }
}


