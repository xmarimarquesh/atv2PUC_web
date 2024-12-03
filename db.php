<?php
$host = 'localhost';
$user = 'root';           // Usuario padrão do MySQL
$password = '';           // Senha padrão do MySQL (ou coloque sua senha, se necessário)
$database = 'algo_doce';  // Nome do banco de dados

// Criando a conexão
$conn = mysqli_connect($host, $user, $password, $database);

// Verificando a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
