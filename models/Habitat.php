<?php

require_once __DIR__ . '/../config/database.php';

class Habitat {
    
    // Récupérer tous les habitats
    public static function getAll(): array {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM habitat");
        return $stmt->fetchAll();
    }

    // Récupérer un habitat par son ID (utile pour les pages de détails)
    public static function getById(int $id): ?array {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM habitat WHERE habitat_id = ?");
        $stmt->execute([$id]);
        $habitat = $stmt->fetch();
        
        return $habitat ? $habitat : null;
    }
}