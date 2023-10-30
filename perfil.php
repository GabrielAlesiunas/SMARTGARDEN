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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="assets/js/script Dropdown.js"></script>
    <title>Perfil do Usuário</title>
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
                        <a href="index.php" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">Sobre</a>
                    </li>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">Produtos</a>
                    </li>
                    <li class="nav__item">
                        <a href="#faqs" class="nav__link">FAQs</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">Contato</a>
                    </li>

                    <li class="nav__item">
                        <?php if (!isset($_SESSION['username'])) : ?>
                            <button class="nav__link" id="loginButton" onclick="abrirModalLogin()">
                                <i class="fas fa-user"></i> Minha Conta
                            </button>
                        <?php endif; ?>
                    </li>
                    <li class="nav__item">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <div class="dropdown">
                                <a class="nav__link" id="dropdownButton">
                                    <?php echo $username; ?> <i class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-content" id="dropdownContent">
                                    <a href="perfil.php" id="perfilLink">Perfil</a>
                                    <a href="logout.php" id="logoutLink">Logout</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </nav>
        <h1 id="perfilUser">Perfil do Usuário</h1>
        <!-- <a href="index.php"><button class="voltarInicio">Voltar ao Início</button></a> -->
    </header>
    <main>
        <div class="centered-container">
            <div class="profile-image-container">
                <div class="profile-image-wrapper">
                    <img src="<?php echo $caminho_da_imagem_de_perfil; ?>" alt="Imagem de perfil" class="rounded-image">
                    <label for="profile-image-upload" class="profile-image-upload-button">
                        <i class="fas fa-camera"></i> Trocar Imagem
                    </label>
                    <input type="file" id="profile-image-upload" accept="image/*" style="display: none;">
                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/script User.js"></script>
</body>
</html>