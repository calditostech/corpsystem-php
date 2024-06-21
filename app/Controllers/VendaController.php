<?php

namespace App\Controllers;

use App\Repositories\VendaRepository;
use App\Models\Venda;

class VendaController {
    private $vendaRepository;

    public function __construct() {
        $this->vendaRepository = new VendaRepository();
    }

    public function index() {
        $vendas = $this->vendaRepository->getAll();
        include __DIR__ . '/../Views/Vendas/Index.php';
    }

    public function createForm() {
        include __DIR__ . '/../Views/Vendas/Create.php';
    }   

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data'] ?? '';
            $clienteId = $_POST['cliente_id'] ?? '';
            $total = $_POST['total'] ?? '';
    
            $venda = new Venda();
            $venda->data = $data;
            $venda->cliente_id = $clienteId;
            $venda->total = $total;
    
            $this->vendaRepository->create($venda);
    
            header('Location: /index.php?action=venda-index');
            exit;
        } else {
            echo "Método não permitido para 'venda-create'.";
        }
    }    

    public function editForm($id) {
        $venda = $this->vendaRepository->getById($id);
    
        if (!$venda) {
            echo "Venda não encontrada.";
            return;
        }
    
        include __DIR__ . '/../Views/Vendas/Edit.php';
    }    

    public function update($id, $data, $cliente_id, $total) {
        $venda = new Venda();
        $venda->id = $id;
        $venda->data = $data;
        $venda->cliente_id = $cliente_id;
        $venda->total = $total;
        $this->vendaRepository->update($venda);

        echo "Venda atualizada com sucesso!";
        header('Location: /index.php?action=venda-index');
        exit;
    }

    public function delete($id) {
        $this->vendaRepository->delete($id);
        echo "Venda excluída com sucesso!";
        header('Location: /index.php?action=venda-index');
        exit;
    }

    public function getById($id) {
        $venda = $this->vendaRepository->getById($id);
        if ($venda) {
            echo json_encode($venda);
        } else {
            echo "Cliente não encontrado.";
        }
        return $this->vendaRepository->getById($id);
    }

    public function relatorioVendas() {
        $dataInicio = $_POST['dataInicio'] ?? null;
        $dataFim = $_POST['dataFim'] ?? null;

        $vendas = $this->vendaRepository->relatorioVendas($dataInicio, $dataFim);

        include __DIR__ . '/../Views/Vendas/Relatorio-Vendas.php';
    }

    public function filtrarRelatorioVendas() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataInicio = $_POST['dataInicio'] ?? null;
            $dataFim = $_POST['dataFim'] ?? null;

            $vendas = $this->vendaRepository->filtrarRelatorioVendas($dataInicio, $dataFim);

            include __DIR__ . '/../Views/Vendas/Relatorio-Vendas.php';
        } else {
            echo "Método não permitido para 'filtrar-relatorio-vendas'.";
        }
    }
}
