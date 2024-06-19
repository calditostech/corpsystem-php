<?php

namespace App\Models;

use App\Database;
use PDO;

class Cliente {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllClientes() {
        $query = "SELECT * FROM Clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCliente($nome, $endereco, $telefone) {
        $query = "INSERT INTO Clientes (nome, endereco, telefone) VALUES (:nome, :endereco, :telefone)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':telefone', $telefone);

        return $stmt->execute();
    }
}
