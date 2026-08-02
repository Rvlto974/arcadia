<?php

namespace App;

class Router
{
    private array $routes = [];

    /**
     * Enregistre une route générique
     */
    public function add(string $method, string $path, mixed $action): void
    {
        $path = '/' . trim($path, '/');
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }
        $this->routes[strtoupper($method)][$path] = $action;
    }

    /**
     * Enregistre une route GET
     */
    public function get(string $path, mixed $action): void
    {
        $this->add('GET', $path, $action);
    }

    /**
     * Enregistre une route POST
     */
    public function post(string $path, mixed $action): void
    {
        $this->add('POST', $path, $action);
    }

    /**
     * Résout l'URL demandée
     */
    public function dispatch(string $uri, string $method): void
    {
        // 1. Nettoie l'URI des paramètres GET (?id=1)
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        // 2. Retire le préfixe de dossier si hébergé en sous-dossier
        $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
        if ($scriptDir !== '/' && $scriptDir !== '\\' && strpos($path, $scriptDir) === 0) {
            $path = substr($path, strlen($scriptDir));
        }

        // 3. Normalise le path
        $path = '/' . trim($path, '/');
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        $method = strtoupper($method);

        // 4. Exécution si la route existe
        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];

            // Cas 1 : Fonction anonyme (Closure) ex: /
            if (is_callable($action)) {
                call_user_func($action);
                return;
            }

            // Cas 2 : Contrôleur [ControllerClass, 'methode']
            if (is_array($action)) {
                [$controllerClass, $methodName] = $action;

                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    if (method_exists($controller, $methodName)) {
                        $controller->$methodName();
                        return;
                    }
                }
            }
        }

        // 5. Si aucune route ne correspond
        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
    }
}