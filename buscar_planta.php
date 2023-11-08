<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$nomeDoUsuario = $_SESSION['username'];

$conexao = mysqli_connect("localhost", "root", "", "smartgarden");

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

if (isset($_POST['nomePlanta'])) { // Verifica se a variável POST 'nomePlanta' está definida
    $nomePlanta = $_POST['nomePlanta'];

    $sql = "SELECT * FROM plantas WHERE nome = '$nomePlanta'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = $row;
    } else {
        $response = array('error' => true);
    }
} else {
    $response = array('error' => true);
}

mysqli_close($conexao);

header('Content-Type: application/json');
echo json_encode($response);
?>