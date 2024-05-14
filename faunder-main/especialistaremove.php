<?php
// REMOÇÃO (DELETE) DE ESPECIALISTA

include("conn.php");

if (isset($_GET['id'])) {
    $ID_Especialista = $_GET['id'];

    $sql = "DELETE FROM Especialista WHERE ID_Especialista = '$ID_Especialista'";

    if ($conn->query($sql) === TRUE) {
        echo "Especialista excluído com sucesso.";
        header("Location: especialista_lst.php");
    } else {
        echo "Erro ao excluir o especialista: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do especialista não especificado.";
}
?>
