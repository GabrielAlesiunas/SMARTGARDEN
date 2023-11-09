<?php
function buscarNomesPlantas($conexao) {
    $sql = "SELECT nome FROM plantas";
    $result = $conexao->query($sql);
    $nomesPlantas = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nomesPlantas[] = $row['nome'];
        }
    }

    return $nomesPlantas;
}

if (isset($_GET['nomePlanta'])) {
    $nomePlanta = $_GET['nomePlanta'];

    $conexao = mysqli_connect("localhost", "root", "", "smartgarden");

    $query = "SELECT * FROM plantas WHERE nome = '$nomePlanta'";
    $resultado = mysqli_query($conexao, $query);

    $dadosPlanta = mysqli_fetch_assoc($resultado);

    if ($dadosPlanta) {
        header('Content-Type: application/json');
        echo json_encode($dadosPlanta);
    }

    mysqli_close($conexao);
}
?>