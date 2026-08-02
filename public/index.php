<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Animal;

echo "<h1>🐘 Arcadia Zoo - Test Modèle Animal</h1>";

try {
    // Utilisation de la méthode statique du Modèle
    $animaux = Animal::getAllWithHabitat();

    echo "<h3>🐾 Animaux récupérés via App\\Models\\Animal :</h3><ul>";
    foreach ($animaux as $animal) {
        echo "<li><strong>" . htmlspecialchars($animal['prenom']) . "</strong> - " . htmlspecialchars($animal['race']) . " (<em>" . htmlspecialchars($animal['habitat_nom']) . "</em>)</li>";
    }
    echo "</ul>";

} catch (\Exception $e) {
    echo "<p style='color: red;'>❌ Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}