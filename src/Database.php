<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private static ?Database $instance = null;
    private PDO $connection;

    private function __construct()
    {
        $host = 'arcadia_mysql';
        $dbname = 'arcadia_zoo';
        $user = 'arcadia_user';      // Utiliser l'utilisateur dédié
        $pass = 'arcadia_password';  // Et son mot de passe correspondant

        try {
            $this->connection = new PDO(
                "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Méthode statique pour récupérer directement l'instance PDO
     */
    public static function getConnection(): PDO
    {
        return self::getInstance()->connection;
    }
}