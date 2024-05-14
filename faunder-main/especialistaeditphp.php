<?php
// VALIDAÇÃO (UPDATE) DE ESPECIALISTA

if (isset($_GET["id"])) {
  
    include("conn.php");

    $ID_Especialista = $_GET['id'];

 
    $Nome_Especialista = $_POST['Nome_Especialista'];
    $Apelido_Especialista = $_POST['Apelido_Especialista'];
    $Email_Especialista = $_POST['Email_Especialista'];
    $Senha_Especialista = $_POST['Senha_Especialista'];
    $DataNasci_Especialista = $_POST['DataNasci_Especialista'];


    $sql = "UPDATE Especialista SET Nome_Especialista = '$Nome_Especialista', Apelido_Especialista = '$Apelido_Especialista', Email_Especialista = '$Email_Especialista', Senha_Especialista = '$Senha_Especialista', DataNasci_Especialista = '$DataNasci_Especialista' WHERE ID_Especialista = '$ID_Especialista'";
    
 
    $result = $conn->query($sql);

    if ($result === TRUE) {
 
        header("Location: perfilespecialista.php");
        exit(); 
    } else {
        
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do especialista não especificado.";
}
?>
