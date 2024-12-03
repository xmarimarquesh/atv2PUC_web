<?php
include('config.php');
include('db.php');

redirecionarSeLogado();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nome, email, senha, status) VALUES ('$nome', '$email', '$senha', 'deslogado')";
    if (mysqli_query($conn, $query)) {
        header('Location: login.php');
        exit();
    } else {
        $erro = "Erro ao cadastrar usuário!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Algo Doce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastrar</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger mt-3"><?= $erro ?></div>
            <?php endif; ?>
        </form>
        <p class="mt-3">Já tem uma conta? <a href="login.php">Faça login</a></p>
    </div>
</body>
</html>
