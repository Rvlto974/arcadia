<?php

require_once __DIR__ . '/../config/database.php';

abstract class Model {
    protected ?PDO $db = null;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
}