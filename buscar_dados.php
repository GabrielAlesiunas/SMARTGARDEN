<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pesquisa = $_POST["pesquisa"];

    $sql = "SELECT * FROM situacaoplanta WHERE fk_placa_id LIKE '%$pesquisa%' OR data LIKE '%$pesquisa%' OR temperatura LIKE '%$pesquisa%' OR umidade LIKE '%$pesquisa%' OR luminosidade LIKE '%$pesquisa%'";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Resultados da Pesquisa:</h3>";
        echo "<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Id Placa</th>
                    <th scope='col'>Data</th>
                    <th scope='col'>Temperatura</th>
                    <th scope='col'>Umidade</th>
                    <th scope='col'>Luminosidade</th>
                </tr>;
            </thead>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['fk_placa_id']}</td>
                    <td>{$row['data']}</td>
                    <td>{$row['temperatura']}</td>
                    <td>{$row['umidade']}</td>
                    <td>{$row['luminosidade']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }
}

$conexao->close();
