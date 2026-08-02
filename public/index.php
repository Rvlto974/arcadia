<?php

// Activation explicite des erreurs PHP pour le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chargement de l'autoloader Composer (PSR-4)
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AnimalController;

$controller = new AnimalController();
$controller->index();