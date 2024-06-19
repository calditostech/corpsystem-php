<?php

namespace App\Repositories;

use App\Database;
use App\Models\ItemVenda;
use PDO;

class ItemVendaRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create(ItemVenda $itemVenda) {
        $query = "INSERT INTO ItensVenda (venda_id, produto_id, quantidade, preco_unitario) VALUES (:venda_id, :produto_id, :quantidade, :preco_unitario)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':venda_id', $itemVenda->venda_id);
        $stmt->bindParam(':produto_id', $itemVenda->produto_id);
        $stmt->bindParam(':quantidade', $itemVenda->quantidade);
        $stmt->bindParam(':preco_unitario', $itemVenda->preco_unitario);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getAll() {
        $query = "SELECT * FROM ItensVenda";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, ItemVenda::class);
    }

    public function getById($id) {
        $query = "SELECT * FROM ItensVenda WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(ItemVenda::class);
    }

    public function update(ItemVenda $itemVenda) {
        $query = "UPDATE ItensVenda SET venda_id = :venda_id, produto_id = :produto_id, quantidade = :quantidade, preco_unitario = :preco_unitario WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':venda_id', $itemVenda->venda_id);
        $stmt->bindParam(':produto_id', $itemVenda->produto_id);
        $stmt->bindParam(':quantidade', $itemVenda->quantidade);
        $stmt->bindParam(':preco_unitario', $itemVenda->preco_unitario);
        $stmt->bindParam(':id', $itemVenda->id);
        $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM ItensVenda WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
