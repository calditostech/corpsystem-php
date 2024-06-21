<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edição de Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Edição de Produto</h1>
                <form action="?action=edit-produto" method="POST">
                    <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $produto->nome; ?>">
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $produto->preco; ?>">
                    </div>
                    <div class="form-group">
                        <label for="estoque">Estoque:</label>
                        <input type="text" class="form-control" id="estoque" name="estoque" value="<?php echo $produto->estoque; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="?action=produto-index" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
