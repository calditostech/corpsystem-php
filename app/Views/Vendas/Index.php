<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Vendas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Vendas</h1>
                <div class="mb-3">
                    <a href="?action=cliente-index" class="btn btn-primary">Clientes</a>
                    <a href="?action=venda-index" class="btn btn-success">Vendas</a>
                    <a href="?action=itemvenda-index" class="btn btn-info">Item Venda</a>
                    <a href="?action=produto-index" class="btn btn-warning">Produtos</a>
                    <a href="?action=clientes-estoque" class="btn btn-secondary">Estoque</a>
                    <a href="?action=clientes-relatorio" class="btn btn-dark">Relatório Vendas</a>
                </div>
                <a href="?action=create-form-venda" class="btn btn-primary">Criar Nova Venda</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vendas as $venda): ?>
                            <tr>
                                <td><?php echo $venda->id; ?></td>
                                <td><?php echo $venda->data; ?></td>
                                <td><?php echo $venda->cliente_id; ?></td>
                                <td><?php echo $venda->total; ?></td>
                                <td>
                                    <a href="?action=edit-form-vendas&id=<?php echo $venda->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="?action=delete-vendas&id=<?php echo $venda->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
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
