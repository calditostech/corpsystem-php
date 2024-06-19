<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Cadastro de Produto</h1>
                <form action="Router.php?action=produto-create" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="text" class="form-control" id="preco" name="preco">
                    </div>
                    <div class="form-group">
                        <label for="estoque">Estoque:</label>
                        <input type="text" class="form-control" id="estoque" name="estoque">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
