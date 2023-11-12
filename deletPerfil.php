<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$nomeDoUsuario = $_SESSION['username'];

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

$query = "SELECT id FROM usuario WHERE nome = '$nomeDoUsuario'";
$result = mysqli_query($conexao, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row['id'];

    $queryExclusao = "DELETE FROM usuario WHERE id = $idUsuario";
    
    if (mysqli_query($conexao, $queryExclusao)) {
        header('Location: login.php');
        exit();
    } else {
        echo 'Erro ao excluir perfil: ' . mysqli_error($conexao);
    }
} else {
    echo 'Erro ao buscar ID do usuário.';
}

mysqli_close($conexao);
?>