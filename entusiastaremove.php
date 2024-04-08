<?php

include("conn.php");


if (isset($_GET['id'])) {
    $ID_Entusiasta = $_GET['id'];

    $sql = "DELETE FROM Entusiasta WHERE ID_Entusiasta = '$ID_Entusiasta'";

    if ($conn->query($sql) === TRUE) {
        echo "entusiasta excluído com sucesso.";
        header("Location: entusiasta_lst.php");
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do usuário não especificado.";
}
?>
