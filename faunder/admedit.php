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
        $ID_ADM = $_GET['id'];
    }   

    $sql = "SELECT * FROM ADM WHERE ID_ADM = '$ID_ADM'";
    $result = $conn->query($sql);


    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Nome_ADM = $row['Nome_ADM'];
        $Apelido_ADM = $row['Apelido_ADM'];
        $Email_ADM = $row['Email_ADM'];
        $Senha_ADM = "";
        $SenhaEpicaSecreta_ADM = $row['SenhaEpicaSecreta_ADM'];
        $DataNasci_ADM = $row['DataNasci_ADM'];
    } else {
        echo "Entusiasta não encontrado.";
    }
?>

<form id="caixa_formulario" action="admeditphp.php?id=<?php echo $ID_ADM; ?>" method="POST">
    
    <input type="hidden" name="ID_ADM" value="<?php echo $ID_ADM; ?>">
    <td>Nome:</td>
    <input type="text" name="Nome_ADM" value="<?php echo $Nome_ADM; ?>" placeholder="Nome" required><br>
    <td>Apelido:</td>
    <input type="text" name="Apelido_ADM" value="<?php echo $Apelido_ADM; ?>" placeholder="Apelido" required><br>
    <td>Email:</td>
    <input type="email" name="Email_ADM" value="<?php echo $Email_ADM; ?>" placeholder="Email" required><br>
    <td>Senha:</td>
    <input type="password" name="Senha_ADM" value="<?php echo $Senha_ADM; ?>" placeholder="Senha" required><br>
    <td>Senha Épica Secreta:</td>
    <input type="password" name="SenhaEpicaSecreta_ADM" value="<?php echo $SenhaEpicaSecreta_ADM;?>" placeholder="Senha Épica Secreta"><br>
    <td>Data de nascimento:</td>
    <input type="date" name="DataNasci_ADM" value="<?php echo $DataNasci_ADM; ?>" placeholder="Data de Nascimento" required><br>
    <input type="submit" value="Salvar">
</form>

</body>
</html>
