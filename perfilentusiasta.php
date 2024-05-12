<?php
session_start();

if (!isset($_SESSION['idEntusiasta'])) {
    header("Location: loginentusiasta.php");
    exit;
}

include("conn.php");

$idEntusiasta = $_SESSION['idEntusiasta'];

// Recupera os posts do entusiasta atual
$sql_posts = "SELECT * FROM Post WHERE fk_Entusiasta_ID_Entusiasta = '$idEntusiasta'";
$result_posts = $conn->query($sql_posts);

// Recupera informações do entusiasta
$sql_entusiasta = "SELECT * FROM Entusiasta WHERE ID_Entusiasta = '$idEntusiasta'";
$result_entusiasta = $conn->query($sql_entusiasta);

if ($result_entusiasta->num_rows > 0) {
    $row = $result_entusiasta->fetch_assoc();
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
            <a href="postcreate.php">Postar</a>
            <a href="entusiastaedit.php?id=<?php echo htmlspecialchars($_SESSION['idEntusiasta']); ?>">Editar</a><br>
            <a href="entusiastaremove.php?id=<?php echo htmlspecialchars($_SESSION['idEntusiasta']); ?>">Remover</a><br>
            <a href="logoutentusiasta.php">Encerrar Sessão</a>
        </div>
    <?php endif; ?>

    <h2>Posts do Entusiasta</h2>
    <?php if ($result_posts->num_rows > 0): ?>
        <ul>
            <?php while ($row_post = $result_posts->fetch_assoc()): ?>
                <li>
                    <p><strong>Data:</strong> <?php echo $row_post['Data_Post']; ?></p>
                    <p><strong>Descrição:</strong> <?php echo $row_post['Descricao_Post']; ?></p>
                    <?php if (!empty($row_post['Imagem_Post'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row_post['Imagem_Post']); ?>" alt="Imagem do Post">
                    <?php endif; ?>
                    <div>
                        <a href="postedit.php?id=<?php echo $row_post['ID_Post']; ?>">Editar</a>
                        <a href="postremove.php?id=<?php echo $row_post['ID_Post']; ?>">Excluir</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum post encontrado.</p>
    <?php endif; ?>

</body>
</html>
