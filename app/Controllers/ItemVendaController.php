<?php

namespace App\Controllers;

use App\Repositories\ItemVendaRepository;
use App\Models\ItemVenda;

class ItemVendaController {
    private $itemVendaRepository;

    public function __construct() {
        $this->itemVendaRepository = new ItemVendaRepository();
    }

    public function index() {
        $itemVenda = $this->itemVendaRepository->getAll();
        include __DIR__ . '/../Views/ItemVenda/Index.php';
    }

    public function createForm() {
        include __DIR__ . '/../Views/ItemVenda/Create.php';
    }   

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendaId = $_POST['venda_id'] ?? '';
            $produtoId = $_POST['produto_id'] ?? '';
            $quantidade = $_POST['quantidade'] ?? '';
            $precoUnitario = $_POST['preco_unitario'] ?? '';
    
            $itemVenda = new ItemVenda();
            $itemVenda->venda_id = $vendaId;
            $itemVenda->produto_id = $produtoId;
            $itemVenda->quantidade = $quantidade;
            $itemVenda->preco_unitario = $precoUnitario;
    
            $this->itemVendaRepository->create($itemVenda);
    
            header('Location: /index.php?action=itemvenda-index');
            exit;
        } else {
            echo "Método não permitido para 'itemvenda-create'.";
        }
    }    

    public function editForm($id) {
        $itemVenda = $this->itemVendaRepository->getById($id);
    
        if (!$itemVenda) {
            echo "Item não encontrado.";
            return;
        }
    
        include __DIR__ . '/../Views/ItemVenda/Edit.php';
    }    

    public function update($id, $venda_id, $produto_id, $quantidade, $preco_unitario) {
        $itemVenda = new ItemVenda();
        $itemVenda->id = $id;
        $itemVenda->venda_id = $venda_id;
        $itemVenda->produto_id = $produto_id;
        $itemVenda->quantidade = $quantidade;
        $itemVenda->preco_unitario = $preco_unitario;
        $this->itemVendaRepository->update($itemVenda);
    }

    public function delete($id) {
        $this->itemVendaRepository->delete($id);
        echo "Item excluído com sucesso!";
        header('Location: /index.php?action=itemvenda-index');
        exit;
    }

    public function getById($id) {
        return $this->itemVendaRepository->getById($id);
    }
}
