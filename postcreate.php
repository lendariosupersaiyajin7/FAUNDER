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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];
    $descricao_post = $_POST['descricao_post'];
    $data_post = date('Y-m-d');
    $idUsuario = isset($_SESSION['idEntusiasta']) ? $_SESSION['idEntusiasta'] : $_SESSION['idEspecialista'];

    if ($acao == "criar") {
        $imagem_post = $_FILES['imagem_post']['tmp_name'];
        $conteudo_imagem = $imagem_post ? addslashes(file_get_contents($imagem_post)) : null;

        if ($conteudo_imagem) {
            $query = "INSERT INTO Post (Data_Post, Descricao_Post, Like_Post, Imagem_Post, fk_Entusiasta_ID_Entusiasta, fk_Forum_ID_Forum) VALUES (?, ?, 0, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssii", $data_post, $descricao_post, $conteudo_imagem, $idUsuario, $idForum);
        } else {
            $query = "INSERT INTO Post (Data_Post, Descricao_Post, Like_Post, fk_Entusiasta_ID_Entusiasta, fk_Forum_ID_Forum) VALUES (?, ?, 0, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssii", $data_post, $descricao_post, $idUsuario, $idForum);
        }

        if ($stmt->execute()) {
            header("Location: publicacoes.php?id=" . $idForum);
            exit;
        } else {
            echo "Erro ao criar o post: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postcreate.css">
    <title>Criar Post</title>
</head>
<body>

<h1>Criar Novo Post</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $idForum; ?>" method="POST" enctype="multipart/form-data" id="containerImagem">
        <input type="hidden" name="acao" value="criar">
        <label for="descricao_post">Descrição do Post:</label><br>
        <textarea id="descricao_post" name="descricao_post" rows="4" cols="50" required></textarea><br><br>

        <label for="imagem_post">Anexar Imagem:</label><br>
        <input type="file" id="imagem_post" name="imagem_post"><br><br>

        <input type="submit" value="Criar Post" id="botao3">
    </form>

</body>
</html>
