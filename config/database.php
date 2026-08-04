<?php

class Database {
    private static $host = 'db'; // Nom du service dans docker-compose.yml
    private static $db_name = 'zoo_arcadia';
    private static $username = 'root';
    private static $password = 'rootpassword';
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8mb4",
                    self::$username,
                    self::$password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch(PDOException $exception) {
                echo "Erreur de connexion : " . $exception->getMessage();
            }
        }
        return self::$conn;
    }
}