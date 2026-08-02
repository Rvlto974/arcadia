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
     * Récupère tous les avis validés par un employé (Partie publique)
     */
    public function getValides(): array
    {
        $query = "SELECT * FROM avis WHERE is_visible = TRUE ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère tous les avis en attente de modération (Espace employé)
     */
    public function getEnAttente(): array
    {
        $query = "SELECT * FROM avis WHERE is_visible = FALSE ORDER BY id DESC";
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

    /**
     * Valide un avis (rend visible sur le site public)
     */
    public function valider(int $id): bool
    {
        $query = "UPDATE avis SET is_visible = TRUE WHERE id = :id";
        $stmt = $this->db->prepare($query);

        return $stmt->execute(['id' => $id]);
    }

    /**
     * Supprime définitivement un avis refusé
     */
    public function supprimer(int $id): bool
    {
        $query = "DELETE FROM avis WHERE id = :id";
        $stmt = $this->db->prepare($query);

        return $stmt->execute(['id' => $id]);
    }
}