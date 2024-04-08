<?php

include("conn.php");


if (isset($_GET['id'])) {
    $ID_ADM = $_GET['id'];

    $sql = "DELETE FROM ADM WHERE ID_ADM = '$ID_ADM'";

    if ($conn->query($sql) === TRUE) {
        echo "entusiasta excluído com sucesso.";
        header("Location: adm_lst.php");
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do usuário não especificado.";
}
?>
