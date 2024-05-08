<?php
    session_start();
    
    if (!isset($_SESSION['idEspecialista'])) {

        header("Location: loginespecialista.php");
        exit;
    }
    
    
    include("conn.php");
    
    
    $idEntusiasta = $_SESSION['idEspecialista'];


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
        <a href="">Fórum</a>
        <a href="perfilespecialista.php">Perfil</a>


    </div>
</body>
</html>