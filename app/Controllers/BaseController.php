<?php

namespace App\Controllers;

class BaseController{

    protected function render($viewName) {
        require_once __DIR__ . '/../Views/header.php';
        require_once __DIR__ . '/../Views/'. $viewName . '.php';
        require_once __DIR__ . '/../Views/footer.php';
    }

}