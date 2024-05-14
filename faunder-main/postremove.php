<?php
session_start();

if (!isset($_SESSION['idEntusiasta'])) {
    header("Location: loginentusiasta.php");
    exit;
}

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idPost = $_GET["id"];
    $idEntusiasta = $_SESSION['idEntusiasta'];

    // verifica se o post pertence ao entusiasta atual
    $sql_check_post = "SELECT * FROM Post WHERE ID_Post = '$idPost' AND fk_Entusiasta_ID_Entusiasta = '$idEntusiasta'";
    $result_check_post = $conn->query($sql_check_post);

    if ($result_check_post->num_rows > 0) {
        // remove o post do banco de dados
        $sql_delete_post = "DELETE FROM Post WHERE ID_Post = '$idPost'";
        if ($conn->query($sql_delete_post)) {
            header("Location: perfilentusiasta.php");
        } else {
            echo "Erro ao excluir o post: " . $conn->error;
        }
    } else {
        echo "Post não encontrado ou não pertence a este entusiasta.";
    }
} else {
    echo "Requisição inválida.";
}
?>
