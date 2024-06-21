<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Produtos</h1>
                <div class="mb-3">
                    <a href="?action=cliente-index" class="btn btn-primary">Clientes</a>
                    <a href="?action=venda-index" class="btn btn-success">Vendas</a>
                    <a href="?action=itemvenda-index" class="btn btn-info">Item Venda</a>
                    <a href="?action=produto-index" class="btn btn-warning">Produtos</a>
                    <a href="?action=clientes-estoque" class="btn btn-secondary">Estoque</a>
                    <a href="?action=clientes-relatorio" class="btn btn-dark">Relatório Vendas</a>
                </div>
                <a href="?action=create-form-produto" class="btn btn-primary">Criar Novo Produto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?php echo $produto->id; ?></td>
                                <td><?php echo $produto->nome; ?></td>
                                <td><?php echo $produto->preco; ?></td>
                                <td><?php echo $produto->estoque; ?></td>
                                <td>
                                    <a href="?action=edit-form-produto&id=<?php echo $produto->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="?action=delete-produto&id=<?php echo $produto->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
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
