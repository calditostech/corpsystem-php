<?php

require '../app/Database.php'; // Ajuste o caminho conforme necessário

use App\Database;

$db = new Database();
$conn = $db->getConnection();

if ($conn) {
    try {
        // SQL para criar as tabelas
        $sql = "
            CREATE TABLE IF NOT EXISTS Clientes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                endereco TEXT,
                telefone TEXT
            );
            CREATE TABLE IF NOT EXISTS Produtos (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                preco REAL NOT NULL,
                estoque INTEGER
            );
            CREATE TABLE IF NOT EXISTS Vendas (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                data TEXT,
                cliente_id INTEGER,
                total REAL,
                FOREIGN KEY (cliente_id) REFERENCES Clientes(id)
            );
            CREATE TABLE IF NOT EXISTS ItensVenda (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                venda_id INTEGER,
                produto_id INTEGER,
                quantidade INTEGER,
                preco_unitario REAL,
                FOREIGN KEY (venda_id) REFERENCES Vendas(id),
                FOREIGN KEY (produto_id) REFERENCES Produtos(id)
            );
        ";

        // Executa o SQL
        $conn->exec($sql);
        echo "Tabelas criadas com sucesso!";
    } catch (PDOException $exception) {
        echo "Erro ao criar tabelas: " . $exception->getMessage();
    }
} else {
    echo "Falha na conexão com o banco de dados SQLite.";
}
