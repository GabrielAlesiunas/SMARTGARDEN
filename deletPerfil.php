<?php
session_start();
include_once('config.php');
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
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

    echo '<script>
        Swal.fire({
            title: "Você tem certeza?",
            text: "Esta ação é irreversível!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $queryExclusao = "DELETE FROM usuario WHERE id = $idUsuario";
                if (mysqli_query($conexao, $queryExclusao)) {
                    // Exibir mensagem de sucesso
                    Swal.fire({
                        title: "Exclusão realizada com sucesso!",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1700
                    }).then(function() {
                        window.location.href = "index.php";
                    });
                } else {
                    Swal.fire({
                        title: "Erro ao excluir usuário!",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1700
                    }).then(function() {
                        window.location.href = "perfil.php";
                    });
                }
            } else {
                window.location.href = "perfil.php";
            }
        });
    </script>';
} else {
    echo 'Erro ao buscar ID do usuário.';
}

mysqli_close($conexao);
?>