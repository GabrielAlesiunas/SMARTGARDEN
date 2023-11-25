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

$username = $_SESSION['username'];
$query = "SELECT foto_perfil FROM usuario WHERE nome = '$username'";
$result = mysqli_query($conexao, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $caminho_da_imagem_de_perfil = $row['foto_perfil'];
} else {
    echo 'Erro ao buscar imagem de perfil.';
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style TelaUser.css">
    <link rel="stylesheet" href="assets/css/style Dropdown.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="assets/js/script Dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <i class="ri-leaf-line nav__logo-icon"></i> SmartGarden
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="/index.php" class="nav__link active-link">Home</a>
                    </li>

                    <li class="nav__item">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <div class="dropdown">
                                <a class="nav__link" id="dropdownButton">
                                    <?php echo $username; ?> <i class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-content" id="dropdownContent">
                                    <a href="logout.php" id="logoutLink">Logout</a>
                                    <a href="#" id="deletLink">Excluir Perfil</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>

            <div class="nav__btns">
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <h1 id="perfilUser">Perfil do Usuário</h1>
        <div class="centered-container">
            <div class="profile-image-container">
                <div class="profile-image-wrapper">
                    <img src="<?php echo $caminho_da_imagem_de_perfil; ?>" alt="Imagem de perfil" class="rounded-image">

                    <form id="profile-image-form" action="upload_imagem.php" method="post" enctype="multipart/form-data">
                        <label for="profile-image-upload" class="profile-image-upload-button">
                            <i class="fas fa-camera"></i> Trocar Imagem
                        </label>
                        <input type="file" name="profile_image" id="profile-image-upload" accept="image/*" style="display: none;">
                        <button type="button" id="save-profile-button" class="profile-image-upload-button" style="display: none;">
                            <i class="fas fa-save"></i> Salvar Imagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="assets/js/script User.js"></script>

<script>
    document.getElementById('deletLink').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Tem certeza que deseja excluir o perfil?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'deletPerfil.php';
            }
        });
    });
</script>

</html>