<?php
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
    header("Location: adm_lst.php"); // Redireciona para a página de lista de ADMs após o cadastro bem-sucedido
    exit(); // Encerra o script após o redirecionamento
} else {
    echo "Erro ao cadastrar ADM: " . $conn->error; // Em caso de erro na inserção
}

$conn->close(); // Fecha a conexão com o banco de dados
?>
