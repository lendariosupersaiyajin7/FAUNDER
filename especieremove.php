<?php
// REMOÇÃO (DELETE) DE ESPECIALISTA

include("conn.php");

if (isset($_GET['id'])) {
    $ID_Especie = $_GET['id'];

    $sql = "DELETE FROM Especie WHERE ID_Especie = '$ID_Especie'";

    if ($conn->query($sql) === TRUE) {
        echo "Especie excluída com sucesso.";
        header("Location: especie_lst.php");
    } else {
        echo "Erro ao excluir a especie: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID da especie não especificado.";
}
?>
