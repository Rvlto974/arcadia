<?php

class HabitatController {
    public function index() {
        // Inclusion du modèle Habitat (selon ta structure de chargement)
        require_once __DIR__ . '/../models/Habitat.php';
        
        $habitatModel = new Habitat();
        $habitats = $habitatModel->getAllHabitats();

        // Chargement de la vue listant les habitats
        require_once __DIR__ . '/../views/habitats.php';
    }
}