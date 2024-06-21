<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Estoque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Consulta de Estoque</h1>
                <div class="mb-3">
                    <a href="?action=cliente-index" class="btn btn-primary">Clientes</a>
                    <a href="?action=venda-index" class="btn btn-success">Vendas</a>
                    <a href="?action=itemvenda-index" class="btn btn-info">Item Venda</a>
                    <a href="?action=produto-index" class="btn btn-warning">Produtos</a>
                    <a href="?action=clientes-estoque" class="btn btn-secondary">Estoque</a>
                    <a href="?action=clientes-relatorio" class="btn btn-dark">Relatório Vendas</a>
                </div>
                <form action="?action=consultar-estoque" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Buscar produto por nome..." name="search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <td><?php echo $produto->id; ?></td>
                                    <td><?php echo $produto->nome; ?></td>
                                    <td>R$ <?php echo !empty($produto->preco) ? number_format(floatval($produto->preco), 2, ',', '.') : '0,00'; ?></td>
                                    <td><?php echo $produto->estoque; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
