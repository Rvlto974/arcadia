<?php

class Database {
    private string $host = 'db'; // Nom du service dans votre docker-compose ou 'localhost'
    private string $db_name = 'arcadia_db';
    private string $username = 'root';
    private string $password = 'rootpassword';
    private ?PDO $conn = null;

    public function getConnection(): ?PDO {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                    $this->username,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch(PDOException $exception) {
                echo "Erreur de connexion : " . $exception->getMessage();
            }
        }

        return $this->conn;
    }
}