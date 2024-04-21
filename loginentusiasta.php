<?php
    session_start();
    include("conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emailEntusiasta = $_POST["emailEntusiasta"];
        $senhaEntusiasta = $_POST["senhaEntusiasta"];

        // Proteção básica contra SQL injection
        $emailEntusiasta = mysqli_real_escape_string($conn, $emailEntusiasta);
        $senhaEntusiasta = mysqli_real_escape_string($conn, $senhaEntusiasta);

        $sql = "SELECT ID_Entusiasta, Nome_Entusiasta FROM Entusiasta WHERE Email_Entusiasta = '$emailEntusiasta' AND Senha_Entusiasta = '$senhaEntusiasta'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc(); 
            $_SESSION['emailEntusiasta'] = $emailEntusiasta;
            $_SESSION['nomeEntusiasta'] = $user['Nome_Entusiasta'];
            $_SESSION['idEntusiasta'] = $user['ID_Entusiasta']; 
            header("Location: indexcomp.html"); 
            exit;
        } else {
            $error = "O Email ou a Senha estão incorretos.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login de Entusiasta</title>
    <link rel="stylesheet" href="login.css">
</head>
<body id="bodylogin">
    <h2>Login de Entusiasta</h2>
    <form method="POST" action="loginentusiasta.php" id='caixa_formulario'>
        <label for="emailEntusiasta">Email:</label>
        <input type="text" name="emailEntusiasta" required><br>
        <label for="senhaEntusiasta">Senha:</label>
        <input type="password" name="senhaEntusiasta" required><br>
        <button type="submit" id="botao3">Entrar</button>
    </form>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
