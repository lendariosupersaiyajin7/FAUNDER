<?php
    session_start();
    include("conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emailEspecialista = $_POST["emailEspecialista"];
        $senhaEspecialista = $_POST["senhaEspecialista"];

        // Proteção básica contra SQL injection
        $emailEspecialista = mysqli_real_escape_string($conn, $emailEspecialista);
        $senhaEspecialista = mysqli_real_escape_string($conn, $senhaEspecialista);

        $sql = "SELECT ID_Especialista, Nome_Especialista FROM Especialista WHERE Email_Especialista = '$emailEspecialista' AND Senha_Especialista = '$senhaEspecialista'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc(); 
            $_SESSION['emailEspecialista'] = $emailEspecialista;
            $_SESSION['nomeEspecialista'] = $user['Nome_Especialista'];
            $_SESSION['apelidoEspecialista'] = $user['Apelido_Especialista'];
            $_SESSION['idEspecialista'] = $user['ID_Especialista']; 
            header("Location: perfilespecialista.php"); 
            exit;
        } else {
            $error = "O Email ou a Senha estão incorretos.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/login.css">
    <style>
      h2{
        text-align: center;
    }
    </style>
    <title>Login de Especialista</title>
</head>
<body id="bodylogin">
    <h2>Login de Especialista</h2>
    <form method="POST" action="homeespecialista.php" id='caixa_formulario'>
        <label for="emailEspecialista">Email:</label>
        <input type="text" name="emailEspecialista" required><br>
        <label for="senhaEspecialista">Senha:</label>
        <input type="password" name="senhaEspecialista" required><br>
        <button type="submit" id="botao3">Entrar</button>
    </form>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
