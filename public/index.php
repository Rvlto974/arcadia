<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\AnimalController;

$router = new Router();

// Définition des routes
$router->get('/animaux', [AnimalController::class, 'index']);
$router->get('/', [AnimalController::class, 'index']); // Page d'accueil temporaire

// Traitement de la requête
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);