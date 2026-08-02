<?php

// Inclusion de la classe de connexion
require_once __DIR__ . '/../src/Config/Database.php';

use App\Config\Database;

echo "<h1 style='font-family: sans-serif; color: #2e7d32;'>🐘 Arcadia Zoo - Diagnostic BDD</h1>";

// 1. Test MySQL
try {
    $pdo = Database::getPDO();
    echo "<p style='color: green; font-weight: bold;'>✅ Connexion MySQL (MariaDB) réussie !</p>";
} catch (\Throwable $e) {
    echo "<p style='color: red; font-weight: bold;'>❌ Échec MySQL : " . $e->getMessage() . "</p>";
}

// 2. Test MongoDB
try {
    $mongo = Database::getMongo();
    // Envoie un ping à la base MongoDB pour valider la connexion active
    $mongo->selectDatabase('admin')->command(['ping' => 1]);
    echo "<p style='color: green; font-weight: bold;'>✅ Connexion MongoDB réussie !</p>";
} catch (\Throwable $e) {
    echo "<p style='color: red; font-weight: bold;'>❌ Échec MongoDB : " . $e->getMessage() . "</p>";
}