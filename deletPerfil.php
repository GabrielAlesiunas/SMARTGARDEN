<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

$query = "SELECT id FROM usuario WHERE nome = ?";
$stmt = mysqli_prepare($conexao, $query);
mysqli_stmt_bind_param($stmt, 's', $nomeDoUsuario);

if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
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
}
mysqli_stmt_close($stmt);
mysqli_close($conexao);
