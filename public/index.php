<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\AnimalController;
use App\Controllers\HabitatController;
use App\Controllers\ServiceController; // Import du contrôleur des Services

$router = new Router();

// --- Définition des routes ---

// Page d'accueil & Animaux
$router->get('/', [AnimalController::class, 'index']);
$router->get('/animaux', [AnimalController::class, 'index']);

// Habitats
$router->get('/habitats', [HabitatController::class, 'index']);
$router->get('/habitat', [HabitatController::class, 'show']);

// Services
$router->get('/services', [ServiceController::class, 'index']);


// --- Traitement de la requête ---

// Extraire uniquement le chemin sans les paramètres GET (ex: "/habitat?id=1" devient "/habitat")
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Dispatch unique une fois TOUTES les routes déclarées
$router->dispatch($uri, $method);