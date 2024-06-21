<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Clientes</h1>
                <div class="mb-3">
                    <a href="?action=create-form-cliente" class="btn btn-primary">Criar Novo Cliente</a>
                    <a href="?action=venda-index" class="btn btn-success">Vendas</a>
                    <a href="?action=itemvenda-index" class="btn btn-info">Item Venda</a>
                    <a href="?action=produto-index" class="btn btn-warning">Produtos</a>
                    <a href="?action=clientes-estoque" class="btn btn-secondary">Estoque</a>
                    <a href="?action=clientes-relatorio" class="btn btn-dark">Relatório Vendas</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?php echo $cliente->id; ?></td>
                                <td><?php echo $cliente->nome; ?></td>
                                <td><?php echo $cliente->endereco; ?></td>
                                <td><?php echo $cliente->telefone; ?></td>
                                <td>
                                    <a href="?action=edit-form-cliente&id=<?php echo $cliente->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="?action=delete-cliente&id=<?php echo $cliente->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
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
