<?php
    include("conn.php");

    $nomeEspecialista = $_POST["nomeEspecialista"];
    $apelidoEspecialista = $_POST["apelidoEspecialista"];
    $emailEspecialista = $_POST["emailEspecialista"];
    $senhaEspecialista = $_POST["senhaEspecialista"];
    $dataNasciEspecialista = $_POST["dataNasciEspecialista"];
    $comprovanteEspecialista = $_POST["comprovanteEspecialista"];

    $sql = "INSERT INTO Especialista (Nome_Especialista, Apelido_Especialista, Email_Especialista, Senha_Especialista, DataNasci_Especialista, Comprovante_Especialista) VALUES('$nomeEspecialista', '$apelidoEspecialista','$emailEspecialista','$senhaEspecialista', '$dataNasciEspecialista', '$comprovanteEspecialista')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: especialista_lst.php");
    }
    else {
        echo "não foi";
    }

?>