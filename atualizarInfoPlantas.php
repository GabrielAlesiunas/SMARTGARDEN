<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" async></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<?php
include_once('config.php');

if (isset($_POST['luminosidade']) && isset($_POST['umidade']) && isset($_POST['temperatura'])) {
    $luminosidade = $_POST['luminosidade'];
    $umidade = $_POST['umidade'];
    $temperatura = $_POST['temperatura'];

    $stmt = $conexao->prepare("UPDATE placa SET luminosidade=?, umidade=?, temperatura=? WHERE id=1");
    $stmt->bind_param("iii", $luminosidade, $umidade, $temperatura);

    if ($stmt->execute()) {
        echo '<script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Dados atualizados com sucesso!",
                showConfirmButton: false,
                timer: 1700
            }).then(function() {
                window.location.href = "controle.php";
            });
        </script>';
    } else {
        echo '<script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Erro ao atualizar os dados!",
                showConfirmButton: false,
                timer: 1700
            }).then(function() {
                window.location.href = "controle.php";
            });
        </script>';
    }

    $stmt->close();
    $conexao->close();
} else {
    echo '<script>
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Não foi possível atualizar as informações!",
            showConfirmButton: false,
            timer: 1700
        }).then(function() {
            window.location.href = "controle.php";
        });
    </script>';
}
?>