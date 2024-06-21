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
        include __DIR__ . '/../Views/Clientes/Index.php';
    }

    public function createForm() {
        include __DIR__ . '/../Views/Clientes/Create.php';
    }    

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];

            $cliente = new Cliente();
            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
            $cliente->telefone = $telefone;

            $this->clienteRepository->create($cliente);
            echo "Cliente criado com sucesso!";
            header('Location: /index.php?action=cliente-index');
            exit;
        } else {
            echo "Erro: O formulário não foi submetido.";
        }
    }

    public function editForm($id) {
        $cliente = $this->clienteRepository->getById($id);
    
        if (!$cliente) {
            echo "Cliente não encontrado.";
            return;
        }
    
        include __DIR__ . '/../Views/Clientes/Edit.php';
    }    

    public function update($id, $nome, $endereco, $telefone) {
        $cliente = new Cliente();
        $cliente->id = $id;
        $cliente->nome = $nome;
        $cliente->endereco = $endereco;
        $cliente->telefone = $telefone;

        $this->clienteRepository->update($cliente);
        
        echo "Cliente atualizado com sucesso!";
        header('Location: /index.php?action=cliente-index');
        exit;
    }

    public function delete($id) {
        $this->clienteRepository->delete($id);
        echo "Cliente excluído com sucesso!";
        header('Location: /index.php?action=cliente-index');
        exit;
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
