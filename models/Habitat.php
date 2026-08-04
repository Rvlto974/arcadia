<?php

// Inclusion du fichier de configuration de la base de données
require_once __DIR__ . '/../config/database.php';

class Habitat {
    // Récupérer tous les habitats
    public static function all() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM habitats"); // Utilisation de 'habitats' au pluriel
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Alias de compatibilité
    public static function findAll() {
        return self::all();
    }

    // Récupérer un habitat par son ID
    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM habitats WHERE id = ?"); // Utilisation de 'habitats' au pluriel
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Récupérer les animaux d'un habitat spécifique
    public static function getAnimalsByHabitat($habitatId) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM animal WHERE habitat_id = ?");
        $stmt->execute([$habitatId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}