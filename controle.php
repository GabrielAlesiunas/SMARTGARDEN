<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$nomeDoUsuario = $_SESSION['username'];

$sql = "SELECT placa.temperatura, placa.umidade, placa.luminosidade FROM placa WHERE id = 1";
$result = $conexao->query($sql);

$placaData = $result->fetch_assoc();

$conexao->close();
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
    <link rel="stylesheet" href="/assets/css/style Controle.css">
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
                                    <?php echo $nomeDoUsuario; ?> <i class="fas fa-caret-down"></i>
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
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <h1 id="perfilUser">Controle de Irrigação das Plantas</h1>

        <button class="btnConfigPD">Configuração Pré Definido</button>
        <button class="btnPersonalizar">Personalizar</button>

        <form>
            <label for="selectPlant">Selecione uma planta:</label>
            <select id="selectPlant" name="nomePlanta">
                <option value="">Selecione</option>
                <?php
                include('buscar_planta.php');
                $conexao = mysqli_connect("localhost", "root", "", "smartgarden");
                $nomesPlantas = buscarNomesPlantas($conexao);

                foreach ($nomesPlantas as $nomePlanta) {
                    echo "<option value='$nomePlanta'>$nomePlanta</option>";
                }
                mysqli_close($conexao);
                ?>
            </select>
        </form>
        <div id="plantInfo">
            <p>Selecione uma planta para ver informações.</p>
        </div>

        <form class="formInfo" id="formAtualizar" style="display: none;">
            <!-- Luminosidade Ideal -->
            <div class="divLuminosidade">
                <label for="volLuminosidade">Luminosidade Ideal:</label>
                <input type="range" id="volLuminosidade" name="volLuminosidade" min="0" max="100" oninput="exibirLuminosidade(this.value)">
                <span id="spanLuminosidade"><?php echo $placaData['luminosidade']; ?>%</span>
            </div>

            <!-- Temperatura Ideal -->
            <div class="divTemperatura">
                <label for="volTemperatura">Temperatura Ideal:</label>
                <input type="range" id="volTemperatura" name="volTemperatura" min="0" max="45" oninput="exibirTemperatura(this.value)">
                <span id="spanTemperatura"><?php echo $placaData['temperatura']; ?>°C</span>
            </div>

            <!-- Umidade Ideal -->
            <div class="divUmidade">
                <label for="volUmidade">Umidade Ideal:</label>
                <input type="range" id="volUmidade" name="volUmidade" min="0" max="100" oninput="exibirUmidade(this.value)">
                <span id="spanUmidade"><?php echo $placaData['umidade']; ?>%</span>
            </div>
            <input class="btnAtualizar" type="button" value="Atualizar" onclick="enviarParaBanco()">
        </form>
    </main>
    <script src="assets/js/script Controle.js"></script>
</body>

</html>