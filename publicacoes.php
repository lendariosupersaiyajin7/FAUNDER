<?php
session_start();

if (!isset($_SESSION['idEntusiasta'])) {
    echo "Erro: Usuário não autenticado.";
    exit;
}

include("conn.php");

// Consulta para obter as informações dos posts e dos usuários que os criaram
$query = "SELECT Post.ID_Post, Post.Data_Post, Post.Descricao_Post, Post.Imagem_Post, Entusiasta.Nome_Entusiasta 
          FROM Post 
          INNER JOIN Entusiasta ON Post.fk_Entusiasta_ID_Entusiasta = Entusiasta.ID_Entusiasta
          ORDER BY Post.Data_Post DESC"; // Ordena os posts por data decrescente

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Erro ao buscar os posts: " . mysqli_error($conn);
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <?php if ($row['Imagem_Post']): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Imagem_Post']); ?>" alt="Imagem do Post">
            <?php endif; ?>
            <hr>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Não há posts disponíveis.</p>
<?php endif; ?>

<a href="postcreate.php"><button>Criar Post</button></a>

</body>
</html>
