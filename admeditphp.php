<?php
// VALIDAÇÃO E UPDATE DO AMD

if (isset($_GET["id"])) {
  
    include("conn.php");

    $ID_ADM = $_GET['id'];

 
    $Nome_ADM = $_POST['Nome_ADM'];
    $Apelido_ADM = $_POST['Apelido_ADM'];
    $Email_ADM = $_POST['Email_ADM'];
    $Senha_ADM = $_POST['Senha_ADM'];
    $DataNasci_ADM = $_POST['DataNasci_ADM'];


    $sql = "UPDATE ADM SET Nome_ADM = '$Nome_ADM', Apelido_ADM = '$Apelido_ADM', Email_ADM = '$Email_ADM', Senha_ADM = '$Senha_ADM', DataNasci_ADM = '$DataNasci_ADM' WHERE ID_ADM = '$ID_ADM'";
    
 
    $result = $conn->query($sql);

    if ($result === TRUE) {
 
        header("Location: perfiladm.php");
        exit(); 
    } else {
        
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do ADM não especificado.";
}
?>
