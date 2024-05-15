<?php
session_start();

if (!isset($_SESSION['idEntusiasta'])) {
    echo "Erro: Usuário não autenticado.";
    exit;
}

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ID_Post'])) {
        $ID_Post = $_POST['ID_Post'];

        $update_query = "UPDATE Post SET Like_Post = Like_Post + 1 WHERE ID_Post = $ID_Post";

        $result = mysqli_query($conn, $update_query);

        if (!$result) {
            echo "Erro ao curtir o post: " . mysqli_error($conn);
            exit;
        } else {
            // Redireciona de volta para a página anterior
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }
    } else {
        echo "Erro: ID do post não foi recebido.";
        exit;
    }
} else {
    echo "Erro: Método de requisição inválido.";
    exit;
}
?>
