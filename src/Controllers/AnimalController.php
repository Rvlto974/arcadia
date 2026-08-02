<?php

namespace App\Controllers;

use App\Models\Animal;

class AnimalController
{
    public function index(): void
    {
        $animaux = Animal::getAllWithHabitat();

        $viewPath = __DIR__ . '/../../views/animaux/index.php';

        if (!file_exists($viewPath)) {
            die("Erreur : Le fichier de vue est introuvable à l'emplacement : " . $viewPath);
        }

        require_once $viewPath;
    }
}