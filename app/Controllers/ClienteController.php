<?php

namespace App\Controllers;

use App\Repositories\ClienteRepository;
use App\Models\Cliente;

class ClienteController {
    private $clienteRepository;

    public function __construct() {
        $this->clienteRepository = new ClienteRepository();
    }

    public function index() {
        $clientes = $this->clienteRepository->getAll();
        include __DIR__ . '/../Views/clientes/index.php';
    }

    public function create($nome, $endereco, $telefone) {
        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->endereco = $endereco;
        $cliente->telefone = $telefone;
        $this->clienteRepository->create($cliente);
        echo "Cliente criado com sucesso!";
    }

    public function read() {
        $clientes = $this->clienteRepository->getAll();
        header('Content-Type: application/json');
        echo json_encode($clientes);
    }

    public function update($id, $nome, $endereco, $telefone) {
        $cliente = new Cliente();
        $cliente->id = $id;
        $cliente->nome = $nome;
        $cliente->endereco = $endereco;
        $cliente->telefone = $telefone;
        $this->clienteRepository->update($cliente);
        echo "Cliente atualizado com sucesso!";
    }

    public function delete($id) {
        $this->clienteRepository->delete($id);
        echo "Cliente excluído com sucesso!";
    }

    public function getById($id) {
        $cliente = $this->clienteRepository->getById($id);
        if ($cliente) {
            echo json_encode($cliente);
        } else {
            echo "Cliente não encontrado.";
        }
    }
}

?>
