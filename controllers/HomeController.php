<?php

class HomeController {
    public function index() {
        try {
            $host = 'db';
            $dbname = 'zoo_arcadia';
            $username = 'root';
            $password = 'rootpassword'; // Corrigé avec le mot de passe exact du docker-compose

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
            
            // Affichage de la page de succès avec les commentaires HTML requis
            echo "<!DOCTYPE html>
            <!-- Page générée automatiquement après l'initialisation réussie de la base de données -->
            <html lang='fr'>
            <head>
                <meta charset='UTF-8'>
                <!-- Titre de la page d'accueil du Zoo Arcadia -->
                <title>Zoo Arcadia - Initialisation</title>
                <style>
                    body { font-family: 'Open Sans', Arial, sans-serif; background: #f4f4f9; color: #333; text-align: center; padding-top: 50px; }
                    .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 20px; border-radius: 5px; display: inline-block; }
                </style>
            </head>
            <body>
                <!-- Conteneur principal du message de succès -->
                <div class='success'>
                    <h2>Base de données initialisée, tables créées et données importées avec succès !</h2>
                    <p>Vous pouvez maintenant profiter de votre application Zoo Arcadia.</p>
                </div>
            </body>
            </html>";
            exit;
            
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion ou d'exécution SQL
            echo "<div style='color: red; font-family: sans-serif; padding: 20px;'>
                    <h3>Erreur lors de l'initialisation de la base de données :</h3>
                    <p>" . htmlspecialchars($e->getMessage()) . "</p>
                  </div>";
        }
    }
}