<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<?php
include('config.php');

$username = $_POST['nome'];
$email = $_POST['email'];
$password = $_POST['senha'];

$query = "SELECT * FROM usuario WHERE nome = '$username' AND email = '$email' AND senha = '$password'";
$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['login_success'] = true;
    echo '<script>
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Login realizado com sucesso!",
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href = "index.php";
    });
</script>';
    exit();
} else {
    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Falha ao realizar o login!",
        text: "Suas credenciais de login são inválidas!"
    }).then(function() {
        window.location.href = "telaLoginCad.php";
    });
</script>';
}
?>