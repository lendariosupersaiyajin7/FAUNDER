<?php
session_start();

if (!isset($_SESSION['idEntusiasta']) && !isset($_SESSION['idEspecialista'])) {
    echo "Erro: Usuário não autenticado.";
    exit;
}

include("conn.php");

// Verificar se o ID do fórum foi especificado na URL e se é um número válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Erro: ID do fórum não especificado ou inválido.";
    exit;
}

$idForum = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];
    $descricao_post = $_POST['descricao_post'];
    $data_post = date('Y-m-d');
    $idUsuario = isset($_SESSION['idEntusiasta']) ? $_SESSION['idEntusiasta'] : $_SESSION['idEspecialista'];

    if ($acao == "criar") {
        // Verificar se os campos obrigatórios foram preenchidos
        if (empty($descricao_post)) {
            echo "Erro: Descrição do post é obrigatória.";
            exit;
        }

        // Preparar e executar a consulta preparada para inserir o post
        if ($imagem_post = $_FILES['imagem_post']['tmp_name']) {
            $conteudo_imagem = addslashes(file_get_contents($imagem_post));
            $query = "INSERT INTO Post (Data_Post, Descricao_Post, Imagem_Post, fk_Entusiasta_ID_Entusiasta, fk_Forum_ID_Forum) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssi", $data_post, $descricao_post, $conteudo_imagem, $idUsuario, $idForum);
        } else {
            $query = "INSERT INTO Post (Data_Post, Descricao_Post, fk_Entusiasta_ID_Entusiasta, fk_Forum_ID_Forum) VALUES (?, ?, ?, ?)";
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
