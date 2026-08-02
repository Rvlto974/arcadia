<?php

namespace App\Config;

use PDO;
use PDOException;
use Exception;

class Database
{
    private static ?PDO $instance = null;

    /**
     * Le constructeur est privé pour empêcher l'instanciation directe via 'new'.
     */
    private function __construct() {}

    /**
     * Empêche le clonage de l'instance.
     */
    private function __clone() {}

    /**
     * Empêche la désérialisation de l'instance.
     */
    public function __wakeup()
    {
        throw new Exception("Impossible de désérialiser un Singleton.");
    }

    /**
     * Retourne l'instance unique de connexion PDO.
     */
    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $host    = $_ENV['DB_HOST'] ?? 'arcadia_mysql';
            $db      = $_ENV['DB_NAME'] ?? 'arcadia_zoo';
            $user    = $_ENV['DB_USER'] ?? 'root';
            $pass    = $_ENV['DB_PASS'] ?? 'root_password';
            $charset = 'utf8mb4';

            $dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                // Enregistre l'erreur réelle dans les logs du serveur
                error_log('PDO Connection Error: ' . $e->getMessage());

                // Ne divulgue pas les identifiants à l'utilisateur final
                throw new Exception('Erreur de connexion à la base de données. Veuillez reessayer plus tard.');
            }
        }

        return self::$instance;
    }
}