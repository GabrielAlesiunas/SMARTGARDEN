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

$sql = "SELECT nome FROM plantas";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
    }
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style Controle.css">
    <link rel="stylesheet" href="assets/css/style Dropdown.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="assets/js/script Dropdown.js"></script>
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
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>

            <div class="nav__btns">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <h1 id="perfilUser">Controle de Irrigação das Plantas</h1>
        <form>
            <label for="selectPlant">Selecione uma planta:</label>
            <select id="selectPlant" name="nomePlanta">
                <?php
                $sql = "SELECT nome FROM plantas";
                $result = $conexao->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                }
                ?>
            </select>
        </form>
        <div id="plantInfo">
            <!-- Informações da planta selecionada serão exibidas aqui -->
        </div>
    </main>
    <script src="assets/js/script Controle.js"></script>
</body>

</html>