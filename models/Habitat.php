<?php

class Habitat extends Model {
    // Récupérer tous les habitats de la base de données
    public function getAllHabitats() {
        $stmt = $this->db->query("SELECT * FROM habitat");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un habitat spécifique par son ID ou son nom
    public function getHabitatById($id) {
        $stmt = $this->db->prepare("SELECT * FROM habitat WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}