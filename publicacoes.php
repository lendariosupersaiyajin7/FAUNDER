<?php
session_start();

if (!isset($_SESSION['idEntusiasta']) && !isset($_SESSION['idEspecialista'])) {
    echo "Erro: Usuário não autenticado.";
    exit;
}

include("conn.php");

// Verificar se o ID do fórum foi especificado na URL
if (!isset($_GET['id'])) {
    echo "Erro: ID do fórum não especificado.";
    exit;
}

$idForum = $_GET['id'];

// Consulta para obter as informações dos posts específicos do fórum
$query = "SELECT Post.ID_Post, Post.Data_Post, Post.Descricao_Post, Post.Imagem_Post, Post.Like_Post, Entusiasta.Nome_Entusiasta 
          FROM Post 
          INNER JOIN Entusiasta ON Post.fk_Entusiasta_ID_Entusiasta = Entusiasta.ID_Entusiasta
          WHERE Post.fk_Forum_ID_Forum = ?
          ORDER BY Post.Data_Post DESC"; // Ordena os posts por data decrescente

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idForum);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    echo "Erro ao buscar os posts: " . $conn->error;
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/publicacoes.css">
    <title>Publicações</title>
</head>
<body>

<h1>Publicações</h1>


<?php if (mysqli_num_rows($result) > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div>
            <p>Data do Post: <?php echo $row['Data_Post']; ?></p>
            <p>Nome do Usuário: <?php echo $row['Nome_Entusiasta']; ?></p>
            <p>Descrição do Post: <?php echo $row['Descricao_Post']; ?></p>
            <p>Likes: <?php echo $row['Like_Post']; ?></p>

            <form action="like.php" method="post">
                <input type="hidden" name="ID_Post" value="<?php echo $row['ID_Post']; ?>">
                <button type="submit" id="botao4">Curtir</button>
            </form>

            <?php if ($row['Imagem_Post']): ?>
                <img src="data:image/png;base64,<?php echo base64_encode($row['Imagem_Post']); ?>" alt="Imagem do Post">
            <?php endif; ?>

            <?php if (isset($_SESSION['idEspecialista'])): ?>
                <form action="especiecad.php" method="post">
                    <input type="hidden" name="ID_Post" value="<?php echo $row['ID_Post']; ?>">
                    <input type="hidden" name="Descricao_Post" value="<?php echo $row['Descricao_Post']; ?>">
                    <?php if ($row['Imagem_Post']): ?>
                        <input type="hidden" name="Imagem_Post" id="imagemPost" value="<?php echo base64_encode($row['Imagem_Post']); ?>">
                    <?php endif; ?>
                    <button type="submit" id="botao2">Validar Espécie</button>
                </form>
            <?php endif; ?>

            <hr>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Não há posts disponíveis.</p>
<?php endif; ?>

<a href="postcreate.php?id=<?php echo $idForum; ?>"><button id="botao3">Criar Post</button></a>

</body>
</html>
