<?php

namespace App\Models;

use App\Database;
use PDO;

class Avis
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Récupère tous les avis validés par un employé
     */
    public function getValides(): array
    {
        // Remplacement de 'avis_id' par 'id'
        $query = "SELECT * FROM avis WHERE is_visible = TRUE ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Insère un nouvel avis soumis par un visiteur (is_visible = FALSE par défaut)
     */
    public function create(string $pseudo, string $commentaire): bool
    {
        $query = "INSERT INTO avis (pseudo, commentaire, is_visible) 
                  VALUES (:pseudo, :commentaire, FALSE)";
        
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute([
            'pseudo' => $pseudo,
            'commentaire' => $commentaire
        ]);
    }
}