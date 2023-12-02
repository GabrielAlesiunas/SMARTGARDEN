<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $temperatura = $_POST["temperatura"];
    $umidade = $_POST["umidade"];
    $luminosidade = $_POST["luminosidade"];

    $conexao = mysqli_connect("localhost", "root", "", "smartgarden");

    $query = "UPDATE placa SET temperatura = $temperatura, luminosidade = $luminosidade, umidade =$umidade WHERE id = 1";
    mysqli_query($conexao, $query);

    mysqli_close($conexao);

    echo "Dados enviados com sucesso!";
} else {
    echo "Método de requisição inválido.";
}
?>
