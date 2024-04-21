<?php
    session_start();
    include("conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emailADM = $_POST["emailADM"];
        $senhaADM = $_POST["senhaADM"];

        // Proteção básica contra SQL injection
        $emailADM = mysqli_real_escape_string($conn, $emailADM);
        $senhaADM = mysqli_real_escape_string($conn, $senhaADM);

        $sql = "SELECT ID_ADM, Nome_ADM FROM ADM WHERE Email_ADM = '$emailADM' AND Senha_ADM = '$senhaADM'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc(); 
            $_SESSION['emailADM'] = $emailADM;
            $_SESSION['nomeADM'] = $user['Nome_ADM'];
            $_SESSION['idADM'] = $user['ID_ADM']; 
            header("Location: indexcomp3.html"); 
            exit;
        } else {
            $error = "O Email ou a Senha estão incorretos.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login de ADM</title>
    <link rel="stylesheet" href="login.css">
</head>
<body id="bodylogin">
    <h2>Login de ADM</h2>
    <form method="POST" action="loginadm.php" id='caixa_formulario'>
        <label for="emailADM">Email:</label>
        <input type="text" name="emailADM" required><br>
        <label for="senhaADM">Senha:</label>
        <input type="password" name="senhaADM" required><br>
        <button type="submit" id="botao3">Entrar</button>
    </form>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
