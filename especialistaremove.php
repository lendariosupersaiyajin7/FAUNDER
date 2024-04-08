<?php

include("conn.php");


if (isset($_GET['id'])) {
    $ID_Especialista = $_GET['id'];

    $sql = "DELETE FROM Especialista WHERE ID_Especialista = '$ID_Especialista'";

    if ($conn->query($sql) === TRUE) {
        echo "especialista excluído com sucesso.";
        header("Location: especialista_lst.php");
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do usuário não especificado.";
}
?>
