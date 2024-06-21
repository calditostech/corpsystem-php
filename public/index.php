<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ClienteController;
use App\Controllers\ProdutoController;
use App\Controllers\VendaController;
use App\Controllers\ItemVendaController;

$clienteController = new ClienteController();
$produtoController = new ProdutoController();
$vendaController = new VendaController();
$itemVendaController = new ItemVendaController();

// Verifica se há um parâmetro 'action' na query string
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'cliente-index':
            $clienteController->index();
            break;
        case 'create-form-cliente':
            $clienteController->createForm();
            break;
        case 'produto-index':
            $produtoController->index();
            break;
        case 'venda-index':
            $vendaController->index();
            break;
        case 'create-form-venda':
            $vendaController->createForm();
            break;
        case 'itemvenda-index':
            $itemVendaController->index();
            break;
        case 'create-form-item':
            $itemVendaController->createForm();
            break;
        case 'create-form-produto':
            $produtoController->createForm();
            break;
        case 'clientes-estoque':
            $produtoController->consultarEstoque();
            break;
        case 'clientes-relatorio':
            $vendaController->relatorioVendas();
            break;
        case 'edit-form-cliente':
            if (isset($_GET['id'])) {
                $idCliente = $_GET['id'];
                $cliente = $clienteController->editForm($idCliente);
                if ($cliente) {
                    include __DIR__ . '/../Views/Clientes/Edit.php';
                }
            } else {
                echo "ID do cliente não especificado.";
            }
            break;
        case 'edit-cliente':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'] ?? '';
                $nome = $_POST['nome'] ?? '';
                $endereco = $_POST['endereco'] ?? '';
                $telefone = $_POST['telefone'] ?? '';
                $clienteController->update($id, $nome, $endereco, $telefone);
            } else {
                echo "Método não permitido para 'edit-cliente'.";
            }
            break;
        case 'delete-cliente':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $clienteController->delete($id);
            } else {
                echo "ID do cliente não especificado.";
            }
            break;
        case 'edit-form-item-venda':
            if (isset($_GET['id'])) {
                $idItemVenda = $_GET['id'];
                $itemVenda = $itemVendaController->editForm($idItemVenda);
                if ($itemVenda) {
                    include __DIR__ . '/../Views/ItemVenda/Edit.php';
                }
            } else {
                echo "ID do item não especificado.";
            }
            break;
        case 'edit-item-venda':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $vendaId = $_POST['venda_id'] ?? '';
                $produtoId = $_POST['produto_id'] ?? '';
                $quantidade = $_POST['quantidade'] ?? '';
                $precoUnitario = $_POST['preco_unitario'] ?? '';
                $itemVendaController->create($vendaId, $produtoId, $quantidade, $precoUnitario);
            } else {
                echo "Método não permitido para 'edit-item-venda'.";
            }
            break;
        case 'delete-item-venda':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $itemVendaController->delete($id);
            } else {
                echo "ID do item não especificado.";
            }
            break;
        case 'edit-form-produto':
            if (isset($_GET['id'])) {
                $idProduto = $_GET['id'];
                $produto = $produtoController->editForm($idProduto);
                if ($produto) {
                    include __DIR__ . '/../Views/Produto/Edit.php';
                }
            } else {
                echo "ID do produto não especificado.";
            }
            break;
        case 'edit-produto':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'] ?? '';
                $preco = $_POST['preco'] ?? '';
                $estoque = $_POST['estoque'] ?? '';
                $produtoController->create($nome, $preco, $estoque);
            } else {
                echo "Método não permitido para 'edit-produto'.";
            }
            break;
        case 'delete-produto':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $produtoController->delete($id);
            } else {
                echo "ID do produto não especificado.";
            }
            break;
        case 'edit-form-vendas':
            if (isset($_GET['id'])) {
                $idVenda = $_GET['id'];
                $vendas = $vendaController->editForm($idVenda);
                if ($vendas) {
                    include __DIR__ . '/../Views/Vendas/Edit.php';
                }
            } else {
                echo "ID da venda não especificado.";
            }
            break;
        case 'edit-vendas':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST['data'] ?? '';
                $clienteId = $_POST['cliente_id'] ?? '';
                $total = $_POST['total'] ?? '';
                $vendaController->create($data, $clienteId, $total);
            } else {
                echo "Método não permitido para 'edit-cliente'.";
            }
            break;
        case 'delete-vendas':
            $id = $_GET['id'] ?? null;
            if ($id) {
                $vendaController->delete($id);
            } else {
                echo "ID da venda não especificado.";
            }
            break;
        case 'cliente-create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'] ?? '';
                $endereco = $_POST['endereco'] ?? '';
                $telefone = $_POST['telefone'] ?? '';
                $clienteController->create($nome, $endereco, $telefone);
            } else {
                echo "Método não permitido para 'cliente-create'.";
            }
            break;
        case 'produto-create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'] ?? '';
                $preco = $_POST['preco'] ?? '';
                $estoque = $_POST['estoque'] ?? '';
                $produtoController->create($nome, $preco, $estoque);
            } else {
                echo "Método não permitido para 'produto-create'.";
            }
            break;
        case 'venda-create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST['data'] ?? '';
                $clienteId = $_POST['cliente_id'] ?? '';
                $total = $_POST['total'] ?? '';
                $vendaController->create($data, $clienteId, $total);
            } else {
                echo "Método não permitido para 'venda-create'.";
            }
            break;
        case 'itemvenda-create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $vendaId = $_POST['venda_id'] ?? '';
                $produtoId = $_POST['produto_id'] ?? '';
                $quantidade = $_POST['quantidade'] ?? '';
                $precoUnitario = $_POST['preco_unitario'] ?? '';
                $itemVendaController->create($vendaId, $produtoId, $quantidade, $precoUnitario);
            } else {
                echo "Método não permitido para 'itemvenda-create'.";
            }
            break;
        case 'filtrar-relatorio-vendas':
            $vendaController->filtrarRelatorioVendas();
            break;
        case 'consultar-estoque':
            $produtoController->consultarEstoque();
            break;
        default:
            echo "Ação não encontrada.";
            break;
    }
} else {
    // Caso não haja parâmetro 'action', defina uma ação padrão
    $clienteController->index(); // Exemplo: Mostra a lista de clientes
}

?>
