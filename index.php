<?php
include('db.php');
include('config.php');

// Listando os produtos
$query = "SELECT * FROM produtos";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algo Doce - E-commerce de Doces</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Algo Doce</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="cadastro.php">Cadastrar</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Nossos Produtos</h2>
        <div class="row">
            <?php while ($produto = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="default.jpg" class="card-img-top" alt="<?= $produto['nome'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produto['nome'] ?></h5>
                            <p class="card-text"><?= $produto['descricao'] ?></p>
                            <p class="card-text">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                            <a href="produto.php?id=<?= $produto['id'] ?>" class="btn btn-primary">Ver mais</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
