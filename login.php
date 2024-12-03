<?php
include('config.php');
include('db.php');

redirecionarSeLogado();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificando se o usuário existe
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $usuario_db = mysqli_fetch_assoc($result);

    if ($usuario_db && password_verify($senha, $usuario_db['senha'])) {
        $_SESSION['usuario_id'] = $usuario_db['id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Algo Doce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger mt-3"><?= $erro ?></div>
            <?php endif; ?>
        </form>
        <p class="mt-3">Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
</body>
</html>
