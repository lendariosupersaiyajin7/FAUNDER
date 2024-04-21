<?php
session_start();

if (!isset($_SESSION['emailADM'])) {
    header("Location: loginadm.php"); 
    exit; 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da Sessão</title>
    <link rel="stylesheet" href="sessao.css">
</head>
<body id="body">
    <h1 id="titulo">Dados Registrados na Sessão</h1>

    <p><strong id="nome-label">Nome:</strong> <?php echo htmlspecialchars($_SESSION['nomeADM']); ?></p>
    <p><strong id="email-label">Email:</strong> <?php echo htmlspecialchars($_SESSION['emailADM']); ?></p>
    <p><a id="botao3" href="admedit.php?id=<?php echo htmlspecialchars($_SESSION['idADM']); ?>">Editar</a></p>
    <p><a id="botao4" href="admremove.php?id=<?php echo htmlspecialchars($_SESSION['idADM']); ?>">Remover</a></p>
</body>
</html>
