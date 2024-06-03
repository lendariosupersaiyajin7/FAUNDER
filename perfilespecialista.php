<?php

session_start();

if (!isset($_SESSION['idEspecialista'])) {
    header("Location: loginespecialista.php");
    exit;
}

include("conn.php");

$idEspecialista = $_SESSION['idEspecialista'];

$sql = "SELECT * FROM Especialista WHERE ID_Especialista = '$idEspecialista'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nomeEspecialista = $row['Nome_Especialista'];
    $apelidoEspecialista = $row['Apelido_Especialista'];
    $emailEspecialista = $row['Email_Especialista'];
} else {
    $error = "Perfil não encontrado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/perfil.css">
    <title>Perfil do Especialista</title>
</head>
<body>
    <h2>Perfil do Especialista</h2>
    <div id="perfil">
        <p><strong>Nome:</strong> <?php echo $nomeEspecialista; ?></p>
        <p><strong>Apelido: </strong> <?php echo $apelidoEspecialista; ?></p>
        <p><strong>Email:</strong> <?php echo $emailEspecialista; ?></p>
    </div>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php else: ?>
        <div id="opcoes">
            <a href="especialistaedit.php?id=<?php echo htmlspecialchars($_SESSION['idEspecialista']); ?>">Editar</a><br>
            <a href="especialistaremove.php?id=<?php echo htmlspecialchars($_SESSION['idEspecialista']); ?>">Remover</a><br>
            <a href="logoutespecialista.php">Encerrar Sessão</a>
        </div>
    <?php endif; ?>
</body>
</html>
