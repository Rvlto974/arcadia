<?php


require_once __DIR__ . '/../models/Habitat.php';
require_once __DIR__ . '/../views/habitats.php';

class HabitatController {
    public function index() {
        try {
            $host = 'db';
            $dbname = 'zoo_arcadia';
            $username = 'root';
            $password = 'rootpassword';

            // Connexion PDO
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            // Récupération des habitats
            $habitatModel = new Habitat($db);
            $habitats = $habitatModel->getAll();

            // Chargement de la vue
            require_once __DIR__ . '/../views/habitats.php';

        } catch (PDOException $e) {
            echo "<div style='color: red; padding: 20px;'>
                    <h3>Erreur d'affichage des habitats :</h3>
                    <p>" . htmlspecialchars($e->getMessage()) . "</p>
                  </div>";
        }
    }
}