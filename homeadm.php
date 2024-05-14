<?php
    session_start();
    
    if (!isset($_SESSION['idADM'])) {

        header("Location: logiadm.php");
        exit;
    }
    
    
    include("conn.php");
    
    
    $idEntusiasta = $_SESSION['idADM'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAUNDER</title>
</head>
<body>
    
    <div>
        <a href="">Catálogo</a>
        <a href="forum.php">Fórum</a>
        <a href="perfiladm.php">Perfil</a>


    </div>
</body>
</html>