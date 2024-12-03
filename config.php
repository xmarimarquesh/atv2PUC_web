<?php
session_start();

// Função para garantir que o usuário está logado
function verificarLogin() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: login.php');
        exit();
    }
}

// Função para redirecionar se já estiver logado
function redirecionarSeLogado() {
    if (isset($_SESSION['usuario_id'])) {
        header('Location: dashboard.php');
        exit();
    }
}
?>
