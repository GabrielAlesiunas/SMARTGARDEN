<?php
include('config.php');

$sql = "SELECT placa.temperatura, placa.umidade, placa.luminosidade FROM placa WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "Nenhum dado encontrado";
}

$conn->close();
?>