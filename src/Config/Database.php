<?php

namespace App\Config;

use PDO;
use PDOException;

class Database 
{
    // Configuration MySQL (noms exacts de vos conteneurs Docker)
    private static string $host = 'arcadia_mysql';
    private static string $dbName = 'arcadia';
    private static string $username = 'arcadia_user';
    private static string $password = 'arcadia_password';
    private static ?PDO $pdo = null;

    // Singleton PDO MySQL
    public static function getPDO(): PDO 
    {
        if (self::$pdo === null) {
            try {
                $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", self::$host, self::$dbName);
                self::$pdo = new PDO($dsn, self::$username, self::$password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                throw new \Exception("Erreur de connexion MySQL : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }

    // Alias pour appeler getMySQLConnection() au besoin
    public static function getMySQLConnection(): PDO
    {
        return self::getPDO();
    }

    // Connexion MongoDB native (Driver PECL)
    public static function getMongoDriver(): \MongoDB\Driver\Manager 
    {
        try {
            return new \MongoDB\Driver\Manager("mongodb://arcadia_mongodb:27017");
        } catch (\Exception $e) {
            throw new \Exception("Erreur de connexion MongoDB : " . $e->getMessage());
        }
    }
}