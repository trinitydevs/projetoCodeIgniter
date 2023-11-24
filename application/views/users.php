<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="jquery-3.7.1.min.js"></script>
    <title>Listar categorias</title>
</head>
<body>
    <br>
    <h1 style="text-align: center;">Teachers</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">RG</th>
                <th scope="col">E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($databasetest as $row): ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->nome; ?></td>
                    <td><?php echo $row->rg; ?></td>
                    <td><?php echo $row->email; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>