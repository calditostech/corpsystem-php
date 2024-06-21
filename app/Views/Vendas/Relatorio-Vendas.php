<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Relatório de Vendas</h1>
                <div class="mb-3">
                    <a href="?action=cliente-index" class="btn btn-primary">Clientes</a>
                    <a href="?action=venda-index" class="btn btn-success">Vendas</a>
                    <a href="?action=itemvenda-index" class="btn btn-info">Item Venda</a>
                    <a href="?action=produto-index" class="btn btn-warning">Produtos</a>
                    <a href="?action=clientes-estoque" class="btn btn-secondary">Estoque</a>
                    <a href="?action=clientes-relatorio" class="btn btn-dark">Relatório Vendas</a>
                </div>
                <form action="?action=filtrar-relatorio-vendas" method="POST" class="mb-4">
                    <div class="form-row">
                        <div class="col-auto">
                            <label for="dataInicio">Data Início:</label>
                            <input type="date" id="dataInicio" name="dataInicio" class="form-control">
                        </div>
                        <div class="col-auto">
                            <label for="dataFim">Data Fim:</label>
                            <input type="date" id="dataFim" name="dataFim" class="form-control">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>ID Venda</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vendas as $venda): ?>
                                <tr>
                                    <td><?php echo $venda->venda_id; ?></td>
                                    <td><?php echo $venda->data; ?></td>
                                    <td><?php echo $venda->nome_cliente; ?></td>
                                    <td>R$ <?php echo number_format($venda->total, 2, ',', '.'); ?></td>
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
