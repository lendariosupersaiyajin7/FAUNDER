<?php
// VALIDAÇÃO (INSERT) DE ESPECIE
include("conn.php");

$nomeCientificoEspecie = $_POST["nomeCientificoEspecie"];
$nomeComumEspecie = $_POST["nomeComumEspecie"];
$dataRegistroEspecie = $_POST["dataRegistroEspecie"];
$descricaoEspecie = $_POST["descricaoEspecie"];
$imagemEspecie = $_FILES["imagemEspecie"]["tmp_name"]; 


if (isset($imagemEspecie) && !empty($imagemEspecie)) {
    $imagemEspecie = addslashes(file_get_contents($imagemEspecie)); 
} else {
    $imagemEspecie = null;
}

$sql = "INSERT INTO Especie (NomeCientifico_Especie, NomeComum_Especie, DataRegistro_Especie, Descricao_Especie, Imagem_Especie) VALUES('$nomeCientificoEspecie', '$nomeComumEspecie', '$dataRegistroEspecie', '$descricaoEspecie', '$imagemEspecie')";
$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: especie_lst.php");
} else {
    echo "Erro ao inserir dados na tabela Especie: " . $conn->error;
}

?>
