<?php

namespace App\Models; // 👈 Modifié : "Models" avec un S

use App\Config\Database;
use PDO;

class ServiceModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getPDO();
    }

    /**
     * Récupère la liste complète des services du zoo
     */
    public function getAllServices(): array
    {
        $stmt = $this->db->query("SELECT * FROM service ORDER BY id ASC");
        return $stmt->fetchAll();
    }
}