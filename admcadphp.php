<?php
// VALIDACAO DE FORMULARIO DE ADM
include("conn.php");

$nomeADM = $_POST["nomeADM"];
$apelidoADM = $_POST["apelidoADM"];
$emailADM = $_POST["emailADM"];
$senhaADM = $_POST["senhaADM"];
$senhaEpicaSecretaADM = $_POST["senhaEpicaSecretaADM"];
$dataNasciADM = $_POST["dataNasciADM"];

$sql = "INSERT INTO ADM (Nome_ADM, Apelido_ADM, Email_ADM, Senha_ADM, SenhaEpicaSecreta_ADM, DataNasci_ADM) VALUES ('$nomeADM', '$apelidoADM','$emailADM','$senhaADM', '$senhaEpicaSecretaADM','$dataNasciADM')";
$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: loginadm.php"); 
    exit(); 
} else {
    echo "Erro ao cadastrar ADM: " . $conn->error; 
}

$conn->close(); 
?>