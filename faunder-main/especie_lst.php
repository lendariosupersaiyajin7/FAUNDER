<?php
    // CONEXÃO COM O BANCO DE DADOS
    include("conn.php");

    // CONSULTA AO BANCO DE DADOS
    $sql = "SELECT ID_Especie, NomeCientifico_Especie, NomeComum_Especie, DataRegistro_Especie, Descricao_Especie FROM Especie";
    $result = $conn->query($sql);

    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página</title>
    <link rel="stylesheet" href="tabelas.css">
</head>
<body>

Número de Registros: <?php echo $result->num_rows; ?><br><br>
<a id="botao2" href="especiecad.php">Realizar Registro</a><br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nome Científico</th>
        <th>Nome Comum</th>
        <th>Data de Registro</th>
        <th>Descrição</th>
        <th colspan="3">Operações</th>
    </tr>

<?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?php echo $row["ID_Especie"]?></td>
            <td><?php echo $row["NomeCientifico_Especie"]?></td>
            <td><?php echo $row["NomeComum_Especie"]?></td>
            <td><?php echo $row["DataRegistro_Especie"]?></td>
            <td><?php echo $row["Descricao_Especie"]?></td>
            <td><a id="botao3" href="perfilespecie.php?id=<?php echo $row['ID_Especie']; ?>">Exibir</a></td>
            <td><a id="botao3" href="especieedit.php?id=<?php echo $row['ID_Especie']; ?>">Editar</a></td>
            <td><a id="botao4" href="especieremove.php?id=<?php echo $row['ID_Especie']; ?>">Remover</a></td>
        </tr>
<?php  
        }
    } else {
        echo "<tr><td colspan='7'>Não há registros.</td></tr>";
    }
?>
</table>

</body>
</html>
