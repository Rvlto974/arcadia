<?php

class Router {
    public function dispatch() {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH);

        switch (true) {
            case $path === '/' || $path === '/index.php':
                require_once __DIR__ . '/controllers/HomeController.php';
                $controller = new HomeController();
                $controller->index();
                break;
                
            case $path === '/habitats':
                require_once __DIR__ . '/controllers/HabitatController.php';
                $controller = new HabitatController();
                $controller->index();
                break;

            case preg_match('#^/habitat/(\d+)$#', $path, $matches):
                $id = $matches[1];
                require_once __DIR__ . '/controllers/HabitatController.php';
                $controller = new HabitatController();
                $controller->show($id);
                break;
                
            default:
                http_response_code(404);
                echo "Page non trouvée (404)";
                break;
        }
    }
}