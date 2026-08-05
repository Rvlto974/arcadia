<?php

require_once __DIR__ . '/../models/Habitat.php';

class HabitatController {
    public function index() {
        try {
            // Récupération des habitats via le modèle
            $habitats = Habitat::getAll();

            // Chargement unique de la vue (la connexion PDO est gérée en interne par Database::getInstance())
            require_once __DIR__ . '/../views/habitats.php';

        } catch (Exception $e) {
            echo "<div style='color: red; padding: 20px;'>
                    <h3>Erreur d'affichage des habitats :</h3>
                    <p>" . htmlspecialchars($e->getMessage()) . "</p>
                  </div>";
        }
    }
}