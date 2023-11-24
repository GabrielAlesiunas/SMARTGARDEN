<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$diretorio_destino = 'assets/img/imgPerfil/';

$nome_arquivo = $_FILES['perfil_imagem']['name'];
$caminho_completo = $diretorio_destino . $nome_arquivo;

$extensoes_permitidas = array('jpg', 'jpeg', 'png', 'gif');
$extensao_arquivo = strtolower(pathinfo($caminho_completo, PATHINFO_EXTENSION));

if (!in_array($extensao_arquivo, $extensoes_permitidas)) {
    echo 'Formato de imagem não suportado.';
    exit();
}

if (move_uploaded_file($_FILES['perfil_imagem']['tmp_name'], $caminho_completo)) {
    $username = $_SESSION['username'];
    $conexao = mysqli_connect("localhost", "root", "", "smartgarden");
    
    if (!$conexao) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $query = "UPDATE usuario SET foto_perfil = '$caminho_completo' WHERE nome = '$username'";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);

    header('Location: perfil.php');
    exit();
} else {
    echo 'Erro ao fazer upload da imagem.';
}
?>