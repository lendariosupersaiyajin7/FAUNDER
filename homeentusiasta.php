<?php
    session_start();
    
    if (!isset($_SESSION['idEntusiasta'])) {

        header("Location: loginentusiasta.php");
        exit;
    }
    
    
    include("conn.php");
    
    
    $idEntusiasta = $_SESSION['idEntusiasta'];


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
        <a href="perfilentusiasta.php">Perfil</a>


    </div>
</body>
</html>