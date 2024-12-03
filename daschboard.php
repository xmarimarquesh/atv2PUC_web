<?php
include('config.php');
include('db.php');

verificarLogin();

// Listando os produtos
$query = "SELECT * FROM produtos";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Algo Doce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Área de Administração</h2>
        <a href="novo_produto.php" class="btn btn-primary mb-3">Adicionar Produto</a>

        <h3>Lista de Produtos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($produto = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $produto['nome'] ?></td>
                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td><?= $produto['estoque'] ?></td>
                        <td>
                            <a href="editar_produto.php?id=<?= $produto['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="deletar_produto.php?id=<?= $produto['id'] ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
