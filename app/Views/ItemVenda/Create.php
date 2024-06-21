<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Item de Venda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Cadastro de Item de Venda</h1>
                <form action="?action=itemvenda-create" method="POST">
                    <div class="form-group">
                        <label for="venda_id">ID da Venda:</label>
                        <input type="text" class="form-control" id="venda_id" name="venda_id">
                    </div>
                    <div class="form-group">
                        <label for="produto_id">ID do Produto:</label>
                        <input type="text" class="form-control" id="produto_id" name="produto_id">
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade:</label>
                        <input type="text" class="form-control" id="quantidade" name="quantidade">
                    </div>
                    <div class="form-group">
                        <label for="preco_unitario">Preço Unitário:</label>
                        <input type="text" class="form-control" id="preco_unitario" name="preco_unitario">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
