<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoloader PSR-4 maison (pour se passer de composer dump-autoload dans Docker)
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

use App\Router;
use App\Controllers\AnimalController;
use App\Controllers\HabitatController;
use App\Controllers\ServiceController;
use App\Controllers\AvisController;
use App\Controllers\Employee\AvisController as EmployeeAvisController;

$router = new Router();

// --- Définition des routes ---

// Accueil & Animaux
$router->get('/', [AnimalController::class, 'index']);
$router->get('/animaux', [AnimalController::class, 'index']);

// Habitats
$router->get('/habitats', [HabitatController::class, 'index']);
$router->get('/habitat', [HabitatController::class, 'show']);

// Services
$router->get('/services', [ServiceController::class, 'index']);

// Avis Publics
$router->get('/avis', [AvisController::class, 'index']);
$router->post('/avis/creer', [AvisController::class, 'create']);

// Avis Modération Employé
$router->get('/employe/avis', [EmployeeAvisController::class, 'index']);
$router->post('/employe/avis/valider', [EmployeeAvisController::class, 'valider']);
$router->post('/employe/avis/refuser', [EmployeeAvisController::class, 'refuser']);

// --- Traitement de la requête ---
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);