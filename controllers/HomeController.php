<?php

class HomeController {
    public function index() {
        try {
            $host = 'db';
            $dbname = 'zoo_arcadia';
            $username = 'root';
            $password = 'rootpassword';

            // Connexion à la base de données via PDO
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            
            $createSqlPath = __DIR__ . '/../database/create_db.sql';
            $fixturesSqlPath = __DIR__ . '/../database/fixtures.sql';
            
            // Exécution du script de création des tables si le fichier existe
            if (file_exists($createSqlPath)) {
                $db->exec(file_get_contents($createSqlPath));
            }
            
            // Exécution du script des fixtures si le fichier existe
            if (file_exists($fixturesSqlPath)) {
                $db->exec(file_get_contents($fixturesSqlPath));
            }
            
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion ou d'exécution SQL
            echo "<div style='color: red; font-family: sans-serif; padding: 20px;'>
                    <h3>Erreur lors de l'initialisation de la base de données :</h3>
                    <p>" . htmlspecialchars($e->getMessage()) . "</p>
                  </div>";
            return;
        }

        // Chargement de la vue principale contenant le HTML commenté
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}