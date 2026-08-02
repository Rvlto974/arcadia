<?php

namespace App\Controllers;

use App\Models\Habitat;

class HabitatController
{
    public function index(): void
    {
        $habitats = Habitat::all();
        require_once __DIR__ . '/../../views/habitats/index.php';
    }

    public function show(): void
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $habitat = Habitat::find($id);

        if (!$habitat) {
            http_response_code(404);
            die("Habitat introuvable.");
        }

        $animals = Habitat::getAnimals($id);
        require_once __DIR__ . '/../../views/habitats/show.php';
    }
}