<?php
    include("conn.php");

    $sql = "SELECT ID_Entusiasta, Nome_Entusiasta, Apelido_Entusiasta, Email_Entusiasta, Senha_Entusiasta, DataNasci_Entusiasta FROM Entusiasta";
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
<a id="botao2" href="entusiastacad.php">Realizar Registro</a><br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Apelido</th>
        <th>E-mail</th>
        <th>Senha</th>
        <th>Data de Nascimento</th>
        <th colspan="2">Operações</th>
    </tr>

<?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?php echo $row["ID_Entusiasta"]?></td>
            <td><?php echo $row["Nome_Entusiasta"]?></td>
            <td><?php echo $row["Apelido_Entusiasta"]?></td>
            <td><?php echo $row["Email_Entusiasta"]?></td>
            <td><?php echo $row["Senha_Entusiasta"]?></td>
            <td><?php echo $row["DataNasci_Entusiasta"]?></td>
            <td><a id="botao3" href="entusiastaedit.php?id=<?php echo $row['ID_Entusiasta']; ?>">Editar</a></td>
            <td><a id="botao4" href="entusiastaremove.php?id=<?php echo $row['ID_Entusiasta']; ?>">Remover</a></td>
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
