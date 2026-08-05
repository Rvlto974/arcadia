<?php

class Habitat {
    private $db;

    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    /**
     * Récupère la liste de tous les habitats enregistrés
     */
    public function getAll() {
        $sql = "SELECT * FROM habitat";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}