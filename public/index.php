<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;

echo "<h1>🐘 Arcadia Zoo - Test Autoloading & Données</h1>";

try {
    // Utilisation de votre méthode getPDO()
    $pdo = Database::getPDO();

    $stmt = $pdo->query("SELECT animal.prenom, animal.race, habitat.nom AS habitat_nom FROM animal JOIN habitat ON animal.habitat_id = habitat.id");
    $animaux = $stmt->fetchAll();

    echo "<h3>🐾 Animaux chargés via l'Autoloader PSR-4 :</h3><ul>";
    foreach ($animaux as $animal) {
        echo "<li><strong>" . htmlspecialchars($animal['prenom']) . "</strong> - " . htmlspecialchars($animal['race']) . " (<em>" . htmlspecialchars($animal['habitat_nom']) . "</em>)</li>";
    }
    echo "</ul>";

} catch (\Exception $e) {
    echo "<p style='color: red;'>❌ Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}