<?php

namespace App;

use PDO;
use PDOException;

class Database {
    private $dbname = __DIR__ . '/../database/database.sqlite'; 
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("sqlite:{$this->dbname}");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
