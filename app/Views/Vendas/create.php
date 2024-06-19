<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Venda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Cadastro de Venda</h1>
                <form action="Router.php?action=venda-create" method="POST">
                    <div class="form-group">
                        <label for="data">Data:</label>
                        <input type="date" class="form-control" id="data" name="data">
                    </div>
                    <div class="form-group">
                        <label for="cliente_id">ID do Cliente:</label>
                        <input type="text" class="form-control" id="cliente_id" name="cliente_id">
                    </div>
                    <div class="form-group">
                        <label for="total">Total:</label>
                        <input type="text" class="form-control" id="total" name="total">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>