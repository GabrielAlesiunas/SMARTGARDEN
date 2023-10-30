<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $imagemPadrao = 'assets/img/imgPerfil/userpadrao.png';

    $verificarQuery = "SELECT email FROM usuario WHERE email = ?";
    $verificarStmt = mysqli_prepare($conexao, $verificarQuery);
    mysqli_stmt_bind_param($verificarStmt, "s", $email);
    mysqli_stmt_execute($verificarStmt);
    mysqli_stmt_store_result($verificarStmt);

    if (mysqli_stmt_num_rows($verificarStmt) > 0) {
        echo '<script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Erro ao cadastrar",
                text: "Já existe um usuário cadastrado com esse email.",
                showConfirmButton: false,
                timer: 2500
            }).then(function() {
                window.location.href = "telaLoginCad.php";
            });
            </script>';
        exit();
    } else {
        $inserirQuery = "INSERT INTO usuario (nome, email, senha, foto_perfil) VALUES (?, ?, ?, ?)";
        $inserirStmt = mysqli_prepare($conexao, $inserirQuery);
        mysqli_stmt_bind_param($inserirStmt, "ssss", $nome, $email, $senha, $imagemPadrao);
        $inserirResult = mysqli_stmt_execute($inserirStmt);

        if ($inserirResult) {
            echo '<script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Cadastro realizado com sucesso",
                    showConfirmButton: false,
                    timer: 3000
                }).then(function() {
                    window.location.href = "telaLoginCad.php";
                });
                </script>';
            exit();
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conexao);
        }

        mysqli_stmt_close($inserirStmt);
    }

    mysqli_stmt_close($verificarStmt);
    mysqli_close($conexao);
}
?>
