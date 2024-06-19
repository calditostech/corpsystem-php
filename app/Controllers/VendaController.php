<?php

namespace App\Controllers;

use App\Repositories\VendaRepository;
use App\Models\Venda;

class VendaController {
    private $vendaRepository;

    public function __construct() {
        $this->vendaRepository = new VendaRepository();
    }

    public function create($data, $cliente_id, $total) {
        $venda = new Venda();
        $venda->data = $data;
        $venda->cliente_id = $cliente_id;
        $venda->total = $total;
        return $this->vendaRepository->create($venda);
    }

    public function index() {
        return $this->vendaRepository->getAll();
    }

    public function update($id, $data, $cliente_id, $total) {
        $venda = new Venda();
        $venda->id = $id;
        $venda->data = $data;
        $venda->cliente_id = $cliente_id;
        $venda->total = $total;
        $this->vendaRepository->update($venda);
    }

    public function delete($id) {
        $this->vendaRepository->delete($id);
    }

    public function getById($id) {
        return $this->vendaRepository->getById($id);
    }
}
