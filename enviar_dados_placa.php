<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $temperatura = $_POST["temperatura"];
    $umidade = $_POST["umidade"];
    $luminosidade = $_POST["luminosidade"];

    // Conectar ao banco de dados (substitua os valores conforme necessário)
    $conexao = mysqli_connect("localhost", "root", "", "smartgarden");

    // Inserir os dados na tabela "placa"
    $query = "UPDATE placa SET temperatura = $temperatura, luminosidade = $luminosidade, umidade =$umidade WHERE id = 1";
    // $query = "INSERT INTO placa (temperatura, umidade, luminosidade) VALUES ('$temperatura', '$umidade', '$luminosidade')";
    mysqli_query($conexao, $query);

    // Fechar a conexão com o banco de dados
    mysqli_close($conexao);

    echo "Dados enviados com sucesso!";
} else {
    echo "Método de requisição inválido.";
}
?>
