<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Espécie</title>
</head>
<body>
    <?php
    include("conn.php");
    $idEspecie = $_GET["id"]; 

    $sql = "SELECT * FROM Especie WHERE ID_Especie = $idEspecie";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h2>Editar Espécie</h2>
        <form action="especieeditphp.php" method="post">
            <input type="hidden" name="idEspecie" value="<?php echo $row['ID_Especie']; ?>">
            Nome Científico: <input type="text" name="nomeCientificoEspecie" value="<?php echo $row['NomeCientifico_Especie']; ?>"><br>
            Nome Comum: <input type="text" name="nomeComumEspecie" value="<?php echo $row['NomeComum_Especie']; ?>"><br>
            Data de Registro: <input type="date" name="dataRegistroEspecie" value="<?php echo $row['DataRegistro_Especie']; ?>"><br>
            Descrição: <textarea name="descricaoEspecie"><?php echo $row['Descricao_Especie']; ?></textarea><br>
            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        echo "Espécie não encontrada.";
    }
    ?>
</body>
</html>
