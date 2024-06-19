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
                <a href="create.php" class="btn btn-primary mb-3">Criar Novo Item Venda</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID da Venda</th>
                            <th>ID do Produto</th>
                            <th>Quantidade</th>
                            <th>Preço Unitário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($itensVenda as $item): ?>
                            <tr>
                                <td><?php echo $item->id; ?></td>
                                <td><?php echo $item->venda_id; ?></td>
                                <td><?php echo $item->produto_id; ?></td>
                                <td><?php echo $item->quantidade; ?></td>
                                <td><?php echo $item->preco_unitario; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
