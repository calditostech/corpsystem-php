<?php

namespace App\Repositories;

use App\Database;
use App\Models\Venda;
use PDO;

class VendaRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create(Venda $venda) {
        $query = "INSERT INTO Vendas (data, cliente_id, total) VALUES (:data, :cliente_id, :total)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':data', $venda->data);
        $stmt->bindParam(':cliente_id', $venda->cliente_id);
        $stmt->bindParam(':total', $venda->total);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getAll() {
        $query = "SELECT * FROM Vendas";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Venda::class);
    }

    public function getById($id) {
        $query = "SELECT * FROM Vendas WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(Venda::class);
    }

    public function update(Venda $venda) {
        $query = "UPDATE Vendas SET data = :data, cliente_id = :cliente_id, total = :total WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':data', $venda->data);
        $stmt->bindParam(':cliente_id', $venda->cliente_id);
        $stmt->bindParam(':total', $venda->total);
        $stmt->bindParam(':id', $venda->id);
        $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Vendas WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
