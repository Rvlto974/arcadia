<?php

require_once __DIR__ . '/../models/Habitat.php';

class HabitatController {
    
    // Afficher la liste de tous les habitats
    public function index() {
        // Utilisation de la méthode statique de notre modèle unifié
        $habitats = Habitat::all();

        require_once __DIR__ . '/../views/habitats.php';
    }

    // Afficher le détail d'un habitat spécifique et ses animaux
    public function show($id) {
        $habitat = Habitat::find($id);

        // Si l'habitat n'existe pas, on renvoie une erreur 404
        if (!$habitat) {
            http_response_code(404);
            require_once __DIR__ . '/../views/errors/404.php';
            return;
        }

        // Récupération des animaux associés à cet habitat
        $animals = Habitat::getAnimalsByHabitat($id);

        require_once __DIR__ . '/../views/habitat_detail.php';
    }
}