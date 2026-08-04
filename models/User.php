<?php

require_once __DIR__ . '/Model.php';

class User extends Model {
    
    public function findByEmail(string $email): ?array {
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        
        $user = $stmt->fetch();
        return $user ? $user : null;
    }
}