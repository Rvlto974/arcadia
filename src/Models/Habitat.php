<?php

namespace App\Models;

use PDO;

class Habitat
{
    public static function getAll(): array
    {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM habitat ORDER BY nom ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}