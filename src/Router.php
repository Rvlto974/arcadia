<?php

namespace App;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, mixed $action): void
    {
        $path = '/' . trim($path, '/');
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }
        $this->routes[strtoupper($method)][$path] = $action;
    }

    public function get(string $path, mixed $action): void
    {
        $this->add('GET', $path, $action);
    }

    public function post(string $path, mixed $action): void
    {
        $this->add('POST', $path, $action);
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';
        
        $path = '/' . trim($path, '/');
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        $method = strtoupper($method);

        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];

            if (is_callable($action)) {
                call_user_func($action);
                return;
            }

            if (is_array($action)) {
                [$controllerClass, $methodName] = $action;

                if (!class_exists($controllerClass)) {
                    throw new \Exception("La classe du contrôleur '$controllerClass' est introuvable. Vérifie ton namespace ou l'autoloader Composer.");
                }

                $controller = new $controllerClass();
                
                if (!method_exists($controller, $methodName)) {
                    throw new \Exception("La méthode '$methodName' est introuvable dans le contrôleur '$controllerClass'.");
                }

                $controller->$methodName();
                return;
            }
        }

        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
    }
}