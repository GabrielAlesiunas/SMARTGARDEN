<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

$query = "DELETE FROM usuario WHERE nome = '$username'";
$result = mysqli_query($conexao, $query);

mysqli_close($conexao);

if ($result) {
    session_destroy();

    echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Perfil Excluído!',
              text: 'Perfil excluído com sucesso.',
            }).then(function() {
                window.location.href = 'index.php';
            });
          </script>";
    exit();
} else {
    echo 'Erro ao excluir o perfil do usuário.';
}
?>

</body>

</html>