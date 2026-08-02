<?php

// 1. Démarrage de la session PHP
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Autoloader PSR-4 maison sécurisé
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Vérifie que le fichier existe ET que la classe n'a pas déjà été chargée en mémoire
    if (file_exists($file) && !class_exists($class, false)) {
        require_once $file;
    }
});

use App\Router;
use App\Controllers\AuthController;
use App\Controllers\Employee\AvisController;

// 3. Instanciation du Routeur
$router = new Router();

// --- ROUTE RACINE (Redirection vers /login) ---
$router->get('/', function() {
    header('Location: /login');
    exit();
});

// --- ROUTES AUTHENTIFICATION ---
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'postLogin']);
$router->get('/logout', [AuthController::class, 'logout']);

// --- ROUTES ESPACE EMPLOYÉ / ADMIN ---
$router->get('/employe/avis', [AvisController::class, 'index']);

// 4. Traitement de la requête HTTP
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router->dispatch($uri, $method);