<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Démarrage de la session PHP
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Chargement de l'autoloader officiel de Composer
require_once __DIR__ . '/../vendor/autoload.php';

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

// --- ROUTES ESPACE EMPLOYÉ / MODÉRATION DES AVIS ---
$router->get('/employe/avis', [AvisController::class, 'index']);
$router->post('/employe/avis/valider', [AvisController::class, 'valider']);
$router->post('/employe/avis/refuser', [AvisController::class, 'refuser']);

// 4. Traitement de la requête HTTP
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router->dispatch($uri, $method);