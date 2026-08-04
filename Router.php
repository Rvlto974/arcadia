<?php

class Router {
    public function dispatch() {
        // Récupérer l'URL demandée (par défaut '/')
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        
        // Nettoyer l'URI (enlever les query strings s'il y en a)
        $path = parse_url($uri, PHP_URL_PATH);

        // Router simple
        switch ($path) {
            case '/':
            case '/index.php':
                require_once __DIR__ . '/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->index();
                break;
                
            default:
                http_response_code(404);
                echo "Page non trouvée (404)";
                break;
        }
    }
}