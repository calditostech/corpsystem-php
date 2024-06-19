<?php

namespace App\Controllers;

use App\Repositories\ProdutoRepository;
use App\Models\Produto;

class ProdutoController {
    private $produtoRepository;

    public function __construct() {
        $this->produtoRepository = new ProdutoRepository();
    }

    public function create($nome, $preco, $estoque) {
        $produto = new Produto();
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->estoque = $estoque;
        return $this->produtoRepository->create($produto);
    }

    public function index() {
        return $this->produtoRepository->getAll();
    }

    public function update($id, $nome, $preco, $estoque) {
        $produto = new Produto();
        $produto->id = $id;
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->estoque = $estoque;
        $this->produtoRepository->update($produto);
    }

    public function delete($id) {
        $this->produtoRepository->delete($id);
    }

    public function getById($id) {
        return $this->produtoRepository->getById($id);
    }
}
