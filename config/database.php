<?php

class Database {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            $host = 'db'; // Correspond au nom du service dans votre docker-compose.yml
            $dbname = 'zoo_arcadia'; // Correspond à MYSQL_DATABASE
            $username = 'root';
            $password = 'rootpassword'; // Correspond à MYSQL_ROOT_PASSWORD

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}