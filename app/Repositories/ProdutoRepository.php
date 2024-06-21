<?php

namespace App\Repositories;

use App\Database;
use App\Models\Produto;
use PDO;

class ProdutoRepository {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create(Produto $produto) {
        $query = "INSERT INTO Produtos (nome, preco, estoque) VALUES (:nome, :preco, :estoque)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $produto->nome);
        $stmt->bindParam(':preco', $produto->preco);
        $stmt->bindParam(':estoque', $produto->estoque);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getAll() {
        $query = "SELECT * FROM Produtos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Produto::class);
    }

    public function getById($id) {
        $query = "SELECT * FROM Produtos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(Produto::class);
    }

    public function update(Produto $produto) {
        $query = "UPDATE Produtos SET nome = :nome, preco = :preco, estoque = :estoque WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $produto->nome);
        $stmt->bindParam(':preco', $produto->preco);
        $stmt->bindParam(':estoque', $produto->estoque);
        $stmt->bindParam(':id', $produto->id);
        $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Produtos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function consultarEstoque() {
        $sql = "
            SELECT nome, SUM(estoque) AS estoque
            FROM Produtos
            GROUP BY nome;
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getByNome($nome) {
        $sql = "SELECT * FROM Produtos WHERE nome LIKE :nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome', '%' . $nome . '%');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }    
}
