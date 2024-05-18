<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAUNDER - ESPÉCIE</title>
</head>
<body>

<?php
include("conn.php");

if (isset($_GET["id"])) {
    $ID_Especie = $_GET["id"];
} else {
    echo "ID da espécie não fornecido.";
    exit;
}

$sql = "SELECT * FROM Especie WHERE ID_Especie = '$ID_Especie'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Nome_Cientifico = $row["NomeCientifico_Especie"];
    $Nome_Comum = $row["NomeComum_Especie"];
    $DescricaoEspecie = $row["Descricao_Especie"];
    $imagemEspecie = $row["Imagem_Especie"];
    $DataRegistro_Especie = $row["DataRegistro_Especie"];

    // Converter o conteúdo da imagem em um formato de URL
    $imagemDataURL = 'data:image/png;base64,' . base64_encode($imagemEspecie);

} else {
    echo "Espécie não encontrada.";
    exit;
}
?>

<h1>Dados de Espécie</h1>

<p>Nome Científico: <?php echo htmlspecialchars($Nome_Cientifico); ?></p>
<p>Nome Comum: <?php echo htmlspecialchars($Nome_Comum); ?></p>
<p>Descrição de Espécie: <?php echo nl2br(htmlspecialchars($DescricaoEspecie)); ?></p>
<p>Imagem de Espécie:</p>
<!-- Exibir a imagem usando a tag <img> -->
<img src="<?php echo $imagemDataURL; ?>" alt="Imagem de Espécie" style="max-width: 200px; border-radius: 10px;">

<p>Data de Registro: <?php echo htmlspecialchars($DataRegistro_Especie); ?></p>

</body>
</html>
