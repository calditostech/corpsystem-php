<?php

namespace App\Controllers;

use App\Repositories\ProdutoRepository;
use App\Models\Produto;

class ProdutoController {
    private $produtoRepository;

    public function __construct() {
        $this->produtoRepository = new ProdutoRepository();
    }

    public function index() {
        $produtos = $this->produtoRepository->getAll();
        include __DIR__ . '/../Views/Produto/Index.php';
    }

    public function createForm() {
        include __DIR__ . '/../Views/Produto/Create.php';
    }   

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $preco = $_POST['preco'] ?? '';
            $estoque = $_POST['estoque'] ?? '';
    
            $produto = new Produto();
            $produto->nome = $nome;
            $produto->preco = $preco;
            $produto->estoque = $estoque;
    
            $this->produtoRepository->create($produto);
            
            header('Location: /index.php?action=produto-index');
            exit;
        } else {
            echo "Método não permitido para 'produto-create'.";
        }
    }    

    public function editForm($id) {
        $produto = $this->produtoRepository->getById($id);
    
        if (!$produto) {
            echo "Produto não encontrado.";
            return;
        }
    
        include __DIR__ . '/../Views/Produto/Edit.php';
    }    

    public function update($id, $nome, $preco, $estoque) {
        $produto = new Produto();
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->estoque = $estoque;

        $this->produtoRepository->update($produto);

        echo "Produto atualizado com sucesso!";
        header('Location: /index.php?action=produto-index');
        exit;
    }

    public function delete($id) {
        $this->produtoRepository->delete($id);
        echo "Produto excluído com sucesso!";
        header('Location: /index.php?action=produto-index');
        exit;
    }

    public function getById($id) {
        return $this->produtoRepository->getById($id);
    }

    public function consultarEstoque() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'] ?? '';
            $produtos = $this->produtoRepository->getByNome($search);
        } else {
            $produtos = $this->produtoRepository->getAll();
        }
    
        include __DIR__ . '/../Views/Produto/Estoque.php';
    }    
}
