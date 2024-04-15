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
        $ID_Entusiasta = $_GET['id'];
    }   

    $sql = "SELECT * FROM Entusiasta WHERE ID_Entusiasta = '$ID_Entusiasta'";
    $result = $conn->query($sql);


    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Nome_Entusiasta = $row['Nome_Entusiasta'];
        $Apelido_Entusiasta = $row['Apelido_Entusiasta'];
        $Email_Entusiasta = $row['Email_Entusiasta'];
        $Senha_Entusiasta = "";
        $DataNasci_Entusiasta = $row['DataNasci_Entusiasta'];
    } else {
        echo "Entusiasta não encontrado.";
    }
?>

<form id="caixa_formulario" action="entusiastaeditphp.php?id=<?php echo $ID_Entusiasta; ?>" method="POST">
    
    <input type="hidden" name="ID_Entusiasta" value="<?php echo $ID_Entusiasta; ?>">
    <td>Nome:</td>
    <input type="text" name="Nome_Entusiasta" value="<?php echo $Nome_Entusiasta; ?>" placeholder="Nome" required><br>
    <td>Apelido:</td>
    <input type="text" name="Apelido_Entusiasta" value="<?php echo $Apelido_Entusiasta; ?>" placeholder="Apelido" required><br>
    <td>Email:</td>
    <input type="email" name="Email_Entusiasta" value="<?php echo $Email_Entusiasta; ?>" placeholder="Email" required><br>
    <td>Nova Senha:</td>
    <input type="password" name="Senha_Entusiasta" value="<?php echo $Senha_Entusiasta; ?>" placeholder="Nova Senha"><br>
    <td>Data de nascimento:</td>
    <input type="date" name="DataNasci_Entusiasta" value="<?php echo $DataNasci_Entusiasta; ?>" placeholder="Data de Nascimento" required><br>
    <input type="submit" value="Salvar">
</form>

</body>
</html>
