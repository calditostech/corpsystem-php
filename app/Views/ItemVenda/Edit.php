<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edição de Item de Venda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Edição de Item de Venda</h1>
                <form action="?action=edit-item-venda" method="POST">
                    <input type="hidden" name="id" value="<?php echo $itemVenda->id; ?>">
                    <div class="form-group">
                        <label for="venda_id">ID da Venda:</label>
                        <input type="text" class="form-control" id="venda_id" name="venda_id" value="<?php echo $itemVenda->venda_id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="produto_id">ID do Produto:</label>
                        <input type="text" class="form-control" id="produto_id" name="produto_id" value="<?php echo $itemVenda->produto_id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade:</label>
                        <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo $itemVenda->quantidade; ?>">
                    </div>
                    <div class="form-group">
                        <label for="preco_unitario">Preço Unitário:</label>
                        <input type="text" class="form-control" id="preco_unitario" name="preco_unitario" value="<?php echo $itemVenda->preco_unitario; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="?action=itemvenda-index" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
