<?php
// VALIDAÇÃO (UPDATE) DE ENTUSIASTA

if (isset($_GET["id"])) {
  
    include("conn.php");

    $ID_Entusiasta = $_GET['id'];

 
    $Nome_Entusiasta = $_POST['Nome_Entusiasta'];
    $Apelido_Entusiasta = $_POST['Apelido_Entusiasta'];
    $Email_Entusiasta = $_POST['Email_Entusiasta'];
    $Senha_Entusiasta = $_POST['Senha_Entusiasta'];
    $DataNasci_Entusiasta = $_POST['DataNasci_Entusiasta'];


    $sql = "UPDATE Entusiasta SET Nome_Entusiasta = '$Nome_Entusiasta', Apelido_Entusiasta = '$Apelido_Entusiasta', Email_Entusiasta = '$Email_Entusiasta', Senha_Entusiasta = '$Senha_Entusiasta', DataNasci_Entusiasta = '$DataNasci_Entusiasta' WHERE ID_Entusiasta = '$ID_Entusiasta'";
    
 
    $result = $conn->query($sql);

    if ($result === TRUE) {
 
        header("Location: perfilentusiasta.php");
        exit(); 
    } else {
        
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do entusiasta não especificado.";
}
?>