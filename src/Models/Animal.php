<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Animal
{
    /**
     * Récupère tous les animaux avec le nom de leur habitat associé.
     *
     * @return array
     */
    public static function getAllWithHabitat(): array
    {
        $pdo = Database::getPDO();
        $sql = "SELECT animal.id, animal.prenom, animal.race, habitat.nom AS habitat_nom 
                FROM animal 
                JOIN habitat ON animal.habitat_id = habitat.id";
        
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * Récupère un animal spécifique par son ID avec son habitat.
     *
     * @param int $id
     * @return array|false
     */
    public static function getById(int $id): array|false
    {
        $pdo = Database::getPDO();
        $sql = "SELECT animal.id, animal.prenom, animal.race, habitat.nom AS habitat_nom 
                FROM animal 
                JOIN habitat ON animal.habitat_id = habitat.id 
                WHERE animal.id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}