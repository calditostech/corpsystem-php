<?php

namespace App\Repositories;

use App\Database;
use App\Models\Cliente;
use PDO;

class ClienteRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create(Cliente $cliente) {
        $query = "INSERT INTO Clientes (nome, endereco, telefone) VALUES (:nome, :endereco, :telefone)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $cliente->nome);
        $stmt->bindParam(':endereco', $cliente->endereco);
        $stmt->bindParam(':telefone', $cliente->telefone);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getAll() {
        $query = "SELECT * FROM Clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Cliente::class);
    }

    public function getById($id) {
        $query = "SELECT * FROM Clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(Cliente::class);
    }

    public function update(Cliente $cliente) {
        $query = "UPDATE Clientes SET nome = :nome, endereco = :endereco, telefone = :telefone WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $cliente->nome);
        $stmt->bindParam(':endereco', $cliente->endereco);
        $stmt->bindParam(':telefone', $cliente->telefone);
        $stmt->bindParam(':id', $cliente->id);
        $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

?>
