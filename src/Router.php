<?php

namespace App;

class Router
{
    private array $routes = [];

    // Enregistre une route générique (GET, POST, etc.)
    public function add(string $method, string $path, array $action): void
    {
        $this->routes[strtoupper($method)][$path] = $action;
    }

    // Enregistre une route GET
    public function get(string $path, array $action): void
    {
        $this->add('GET', $path, $action);
    }

    // Enregistre une route POST
    public function post(string $path, array $action): void
    {
        $this->add('POST', $path, $action);
    }

    // Résout l'URL demandée
    public function dispatch(string $uri, string $method): void
    {
        // Nettoie l'URI (enlève les query parameters comme ?id=1)
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            [$controllerClass, $methodName] = $this->routes[$method][$path];

            $controller = new $controllerClass();
            $controller->$methodName();
            return;
        }

        // Si la route n'existe pas
        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
    }
}