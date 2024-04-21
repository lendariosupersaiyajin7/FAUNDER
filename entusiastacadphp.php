<?php
    include("conn.php");

    $nomeEntusiasta = $_POST["nomeEntusiasta"];
    $apelidoEntusiasta = $_POST["apelidoEntusiasta"];
    $emailEntusiasta = $_POST["emailEntusiasta"];
    $senhaEntusiasta = $_POST["senhaEntusiasta"];
    $dataNasciEntusiasta = $_POST["dataNasciEntusiasta"];

    $sql = "INSERT INTO Entusiasta (Nome_Entusiasta, Apelido_Entusiasta, Email_Entusiasta, Senha_Entusiasta, DataNasci_Entusiasta) VALUES('$nomeEntusiasta', '$apelidoEntusiasta','$emailEntusiasta','$senhaEntusiasta', '$dataNasciEntusiasta')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: loginentusiasta.php");
    }
    else {
        echo "não foi";
    }

?>