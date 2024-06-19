<?php

namespace App\Controllers;

use App\Repositories\ItemVendaRepository;
use App\Models\ItemVenda;

class ItemVendaController {
    private $itemVendaRepository;

    public function __construct() {
        $this->itemVendaRepository = new ItemVendaRepository();
    }

    public function create($venda_id, $produto_id, $quantidade, $preco_unitario) {
        $itemVenda = new ItemVenda();
        $itemVenda->venda_id = $venda_id;
        $itemVenda->produto_id = $produto_id;
        $itemVenda->quantidade = $quantidade;
        $itemVenda->preco_unitario = $preco_unitario;
        return $this->itemVendaRepository->create($itemVenda);
    }

    public function index() {
        return $this->itemVendaRepository->getAll();
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
    }

    public function getById($id) {
        return $this->itemVendaRepository->getById($id);
    }
}
