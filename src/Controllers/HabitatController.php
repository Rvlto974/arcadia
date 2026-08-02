<?php

namespace App\Controllers;

use App\Models\Habitat;

class HabitatController
{
    public function index(): void
    {
        $habitats = Habitat::getAll();

        $viewPath = __DIR__ . '/../../views/habitats/index.php';

        if (!file_exists($viewPath)) {
            die("Erreur : La vue des habitats est introuvable.");
        }

        require_once $viewPath;
    }
}