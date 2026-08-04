<?php

// Inclusion du fichier de configuration de la base de données
require_once __DIR__ . '/../config/database.php';

class Habitat {
    public function findAll() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM habitats");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}