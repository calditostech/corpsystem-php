<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Itens de Venda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Itens de Venda</h1>
                <div class="mb-3">
                    <a href="?action=cliente-index" class="btn btn-primary">Clientes</a>
                    <a href="?action=venda-index" class="btn btn-success">Vendas</a>
                    <a href="?action=itemvenda-index" class="btn btn-info">Item Venda</a>
                    <a href="?action=produto-index" class="btn btn-warning">Produtos</a>
                    <a href="?action=clientes-estoque" class="btn btn-secondary">Estoque</a>
                    <a href="?action=clientes-relatorio" class="btn btn-dark">Relatório Vendas</a>
                </div>
                <a href="?action=create-form-item" class="btn btn-primary">Criar Novo Item Venda</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID da Venda</th>
                            <th>ID do Produto</th>
                            <th>Quantidade</th>
                            <th>Preço Unitário</th>
                            <th>Açoes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($itemVenda as $item): ?>
                            <tr>
                                <td><?php echo $item->id; ?></td>
                                <td><?php echo $item->venda_id; ?></td>
                                <td><?php echo $item->produto_id; ?></td>
                                <td><?php echo $item->quantidade; ?></td>
                                <td><?php echo $item->preco_unitario; ?></td>
                                <td>
                                    <a href="?action=edit-form-item-venda&id=<?php echo $item->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="?action=delete-item-venda&id=<?php echo $item->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
