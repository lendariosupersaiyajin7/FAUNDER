<?php

session_start();

if (!isset($_SESSION['idADM'])) {
    header("Location: loginadm.php");
    exit;
}

include("conn.php");

$idADM = $_SESSION['idADM'];

$sql = "SELECT * FROM ADM WHERE ID_ADM = '$idADM'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nomeADM = $row['Nome_ADM'];
    $apelidoADM = $row['Apelido_ADM'];
    $emailADM = $row['Email_ADM'];
} else {
    $error = "Perfil não encontrado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil do ADM</title>
</head>
<body>
    <h2>Perfil do ADM</h2>
    <div id="perfil">
        <p><strong>Nome:</strong> <?php echo $nomeADM; ?></p>
        <p><strong>Apelido: </strong> <?php echo $apelidoADM; ?></p>
        <p><strong>Email:</strong> <?php echo $emailADM; ?></p>
    </div>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php else: ?>
        <div id="opcoes">
            <a href="admedit.php?id=<?php echo htmlspecialchars($_SESSION['idADM']); ?>">Editar</a><br>
            <a href="admremove.php?id=<?php echo htmlspecialchars($_SESSION['idADM']); ?>">Remover</a><br>
            <a href="logoutadm.php">Encerrar Sessão</a>
        </div>
    <?php endif; ?>
</body>
</html>
