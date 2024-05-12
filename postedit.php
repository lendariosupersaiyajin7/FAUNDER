<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAUNDER - EDIÇÃO</title>
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
    <form action="posteditphp.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="editar">
        <label>Descrição:</label>
        <input type="text" id="DescricaoPost" name="descricao_post"><br>
        <label>Imagem:</label>
        <input type="file" id="ImagemPost" name="imagem_post"><br>
        <button type="submit">Editar Post</button>
    </form>

</body>
</html>