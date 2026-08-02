<?php

namespace App\Models;

use App\Database;
use PDO;

class Habitat
{
    /**
     * Récupère tous les habitats
     */
    public static function all(): array
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM habitat");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un habitat par son ID
     */
    public static function find(int $id): ?array
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM habitat WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);

        return $habitat ?: null;
    }

    /**
     * Récupère tous les animaux appartenant à un habitat donné
     */
    public static function getAnimals(int $habitatId): array
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM animal WHERE habitat_id = :habitat_id");
        $stmt->execute(['habitat_id' => $habitatId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}