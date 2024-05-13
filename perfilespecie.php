<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAUNDER - ESÉCIE</title>
</head>
<body>

<?php
    include("conn.php");

    if (isset($_GET["id"])) {
        $ID_Especie = $_GET['id'];
    }   

    $sql = "SELECT * FROM Especie WHERE ID_Especie = '$ID_Especie'";
    $result = $conn->query($sql);


    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Nome_Cientifico = $row['NomeCientifico_Especie'];
        $Nome_Comum = $row['NomeComum_Especie'];
        $DescricaoEspecie = $row['Descricao_Especie'];
        $imagemEspecie = $row['Imagem_Especie'];
        $DataRegistro_Especie = $row['DataRegistro_Especie'];

    } else {
        echo "Espécie não encontrada.";
    }
?>
    <h1>Dados de Espécie</h1>

    <p>Nome Científico</p>
    <?php echo $Nome_Cientifico;?>
    <p>Nome Comum</p>
    <?php echo $Nome_Comum;?>
    <p>Descrição de Espécie</p>
    <?php echo $DescricaoEspecie;?>
    <p>Imagem de Espécie</p>
    <img src="<?php echo $imagemEspecie;?>">

    <p>Data de Registro</p>
    <?php echo $DataRegistro_Especie;?>

</body>
</html>
