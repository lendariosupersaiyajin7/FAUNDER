<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAUNDER - EDIÇÃO</title>
    <link rel="stylesheet" href="tabelas.css">
</head>
<body>

<?php
    include("conn.php");

    if (isset($_GET["id"])) {
        $ID_Especialista = $_GET['id'];
    }   

    $sql = "SELECT * FROM Especialista WHERE ID_Especialista = '$ID_Especialista'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Nome_Especialista = $row['Nome_Especialista'];
        $Apelido_Especialista = $row['Apelido_Especialista'];
        $Email_Especialista = $row['Email_Especialista'];
        // Senha não será recuperada para fins de segurança
        $DataNasci_Especialista = $row['DataNasci_Especialista'];
        $Comprovante_Especialista = $row['Comprovante_Especialista'];
    } else {
        echo "Especialista não encontrado.";
    }
?>

<form id="caixa_formulario" action="especialistaeditphp.php?id=<?php echo $ID_Especialista; ?>" method="POST">
    
    <input type="hidden" name="ID_Especialista" value="<?php echo $ID_Especialista; ?>">
    <td>Nome:</td>
    <input type="text" name="Nome_Especialista" value="<?php echo $Nome_Especialista; ?>" placeholder="Nome" required><br>
    <td>Apelido:</td>
    <input type="text" name="Apelido_Especialista" value="<?php echo $Apelido_Especialista; ?>" placeholder="Apelido" required><br>
    <td>Email:</td>
    <input type="email" name="Email_Especialista" value="<?php echo $Email_Especialista; ?>" placeholder="Email" required><br>
    <td>Senha:</td>
    <input type="password" name="Nova_Senha_Especialista" placeholder="Nova Senha"><br>
    <td>Data de nascimento:</td>
    <input type="date" name="DataNasci_Especialista" value="<?php echo $DataNasci_Especialista; ?>" placeholder="Data de Nascimento" required><br>
    <td>Comprovante:</td><br>
    <input type="text" name="Comprovante_Especialista" value="<?php echo $Comprovante_Especialista; ?>" placeholder="Comprovante de Especialista" required><br>
    <input type="submit" value="Salvar">
</form>

</body>
</html>
