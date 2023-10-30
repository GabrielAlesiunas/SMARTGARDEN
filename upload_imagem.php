<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_FILES['profile_image'])) {
    $username = $_SESSION['username'];

    // Diretório onde as imagens de perfil serão armazenadas
    $diretorio_destino = 'assets/img/imgPerfil';

    // Nome do arquivo de imagem
    $nome_arquivo = $_FILES['profile_image']['name'];

    // Caminho completo para o arquivo de imagem
    $caminho_da_imagem_de_perfil = $diretorio_destino . $nome_arquivo;

    // Move o arquivo para o diretório de destino
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $caminho_da_imagem_de_perfil)) {
        $conexao = mysqli_connect("localhost", "root", "", "smartgarden");

        if (!$conexao) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }

        $query = "UPDATE usuario SET foto_perfil = '$caminho_da_imagem_de_perfil' WHERE nome = '$username'";

        if (mysqli_query($conexao, $query)) {
            // echo 'Imagem de perfil atualizada com sucesso.';
            header('Location: perfil.php');
        } else {
            echo 'Erro ao atualizar imagem de perfil: ' . mysqli_error($conexao);
        }

        mysqli_close($conexao);
    } else {
        echo 'Erro ao fazer o upload da imagem.';
    }
} else {
    echo 'Nenhuma imagem selecionada.';
}
?>
