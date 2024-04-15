<?php
    include("conn.php");

    $sql = "SELECT ID_ADM, Nome_ADM, Apelido_ADM, Email_ADM, Senha_ADM, SenhaEpicaSecreta_ADM, DataNasci_ADM FROM ADM";
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
<a id="botao2" href="admcad.php">Realizar Registro</a><br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Apelido</th>
        <th>E-mail</th>
        <th>Senha</th>
        <th>Senha Épica Secreta</th>
        <th>Data de Nascimento</th>
        <th colspan="2">Operações</th>
    </tr>

<?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?php echo $row["ID_ADM"]?></td>
            <td><?php echo $row["Nome_ADM"]?></td>
            <td><?php echo $row["Apelido_ADM"]?></td>
            <td><?php echo $row["Email_ADM"]?></td>
            <td><?php echo $row["Senha_ADM"]?></td>
            <td><?php echo $row["SenhaEpicaSecreta_ADM"]?></td>
            <td><?php echo $row["DataNasci_ADM"]?></td>
            <td><a id="botao3" href="admedit.php?id=<?php echo $row['ID_ADM']; ?>">Editar</a></td>
            <td><a id="botao4" href="admremove.php?id=<?php echo $row['ID_ADM']; ?>">Remover</a></td>
        </tr>
<?php  
        }
    } else {
        echo "<tr><td colspan='8'>Não há registros.</td></tr>";
    }
?>
</table>

</body>
</html>
