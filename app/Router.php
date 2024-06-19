<?php

require_once 'app/Controllers/ClienteController.php';
require_once 'app/Controllers/ProdutoController.php';
require_once 'app/Controllers/VendaController.php';
require_once 'app/Controllers/ItemVendaController.php';

use App\Controllers\ClienteController;
use App\Controllers\ProdutoController;
use App\Controllers\VendaController;
use App\Controllers\ItemVendaController;

$clienteController = new ClienteController();
$produtoController = new ProdutoController();
$vendaController = new VendaController();
$itemVendaController = new ItemVendaController();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'cliente-index':
            $clienteController->index();
            break;
        case 'produto-index':
            $produtoController->index();
            break;
        case 'venda-index':
            $vendaController->index();
            break;
        case 'itemvenda-index':
            $itemVendaController->index();
            break;
        default:
            echo "Ação não encontrada para o método GET.";
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'cliente-create':
            $nome = $_POST['nome'] ?? '';
            $endereco = $_POST['endereco'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $clienteController->create($nome, $endereco, $telefone);
            break;
        case 'produto-create':
            $nomeProduto = $_POST['nome_produto'] ?? '';
            $preco = $_POST['preco'] ?? '';
            $estoque = $_POST['estoque'] ?? '';
            $produtoController->create($nomeProduto, $preco, $estoque);
            break;
        case 'venda-create':
            $data = $_POST['data'] ?? '';
            $clienteId = $_POST['cliente_id'] ?? '';
            $total = $_POST['total'] ?? '';
            $vendaController->create($data, $clienteId, $total);
            break;
        case 'itemvenda-create':
            $vendaId = $_POST['venda_id'] ?? '';
            $produtoId = $_POST['produto_id'] ?? '';
            $quantidade = $_POST['quantidade'] ?? '';
            $precoUnitario = $_POST['preco_unitario'] ?? '';
            $itemVendaController->create($vendaId, $produtoId, $quantidade, $precoUnitario);
            break;
        default:
            echo "Ação não encontrada para o método POST.";
            break;
    }
} else {
    echo "Requisição inválida.";
}

?>
