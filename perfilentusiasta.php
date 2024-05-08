<?php

session_start();


if (!isset($_SESSION['idEntusiasta'])) {

    header("Location: loginentusiasta.php");
    exit;
}


include("conn.php");


$idEntusiasta = $_SESSION['idEntusiasta'];


$sql = "SELECT * FROM Entusiasta WHERE ID_Entusiasta = '$idEntusiasta'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $nomeEntusiasta = $row['Nome_Entusiasta'];
    $apelidoEntusiasta = $row['Apelido_Entusiasta'];
    $emailEntusiasta = $row['Email_Entusiasta'];

} else {

    $error = "Perfil não encontrado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Entusiasta</title>
</head>
<body>
    <h2>Perfil do Entusiasta</h2>
    <div id="perfil">
        <p><strong>Nome:</strong> <?php echo $nomeEntusiasta; ?></p>
        <p><strong>Apelido: </strong> <?php echo $apelidoEntusiasta; ?></p>
        <p><strong>Email:</strong> <?php echo $emailEntusiasta; ?></p>

    </div>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php else: ?>
        <div id="opcoes">
            <a href="entusiastaedit.php?id=<?php echo htmlspecialchars($_SESSION['idEntusiasta']); ?>">Editar</a><br>
            <a href="entusiastaremove.php?id=<?php echo htmlspecialchars($_SESSION['idEntusiasta']); ?>">Remover</a><br>
            <a href="logoutentusiasta.php">Encerrar Sessão</a>
        </div>
    <?php endif; ?>
</body>
</html>
