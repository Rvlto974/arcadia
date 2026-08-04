<?php
require_once 'config/Database.php';

class HomeController {
    public function index() {
        // Test de la connexion
        $db = Database::getConnection();
        
        if ($db) {
            echo "Bienvenue sur l'application Zoo Arcadia ! Le routage MVC fonctionne et la connexion à la base de données est réussie.";
        } else {
            echo "Erreur lors de la connexion à la base de données.";
        }
    }
}