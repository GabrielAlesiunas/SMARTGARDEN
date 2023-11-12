<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $luminosidade = $_GET["volLuminosidade"];
    $temperatura = $_GET["volTemperatura"];
    $umidade = $_GET["volUmidade"];

    include_once('config.php');

    $sql = "INSERT INTO sua_tabela (luminosidade, temperatura, umidade) VALUES ('$luminosidade', '$temperatura', '$umidade')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    $conn->close();
}
?>