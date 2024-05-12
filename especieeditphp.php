<?php
// UPDATE DE ESPECIE
include("conn.php");

$idEspecie = $_POST["idEspecie"];
$nomeCientificoEspecie = $_POST["nomeCientificoEspecie"];
$nomeComumEspecie = $_POST["nomeComumEspecie"];
$dataRegistroEspecie = $_POST["dataRegistroEspecie"];
$descricaoEspecie = $_POST["descricaoEspecie"];

$sql = "UPDATE Especie SET NomeCientifico_Especie='$nomeCientificoEspecie', NomeComum_Especie='$nomeComumEspecie', DataRegistro_Especie='$dataRegistroEspecie', Descricao_Especie='$descricaoEspecie' WHERE ID_Especie=$idEspecie";

if ($conn->query($sql) === TRUE) {
    header("Location: especie_lst.php");
} else {
    echo "Erro ao atualizar espécie: " . $conn->error;
}

$conn->close();
?>
