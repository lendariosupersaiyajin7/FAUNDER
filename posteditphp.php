<?php
session_start();

if (!isset($_SESSION['idEntusiasta'])) {
    header("Location: loginentusiasta.php");
    exit;
}

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];

    if ($acao == "editar") {
        $idEntusiasta = $_SESSION['idEntusiasta'];
        $descricao_post = $_POST['descricao_post'];
        $imagem_post = $_FILES['imagem_post']['tmp_name'];
        $nome_imagem = $_FILES['imagem_post']['name'];

        // verifica se foi enviada uma nova imagem
        if ($imagem_post) {
            $conteudo_imagem = addslashes(file_get_contents($imagem_post));
            $query = "UPDATE Post SET Descricao_Post = '$descricao_post', Imagem_Post = '$conteudo_imagem' WHERE fk_Entusiasta_ID_Entusiasta = '$idEntusiasta'";
        } else {
            $query = "UPDATE Post SET Descricao_Post = '$descricao_post' WHERE fk_Entusiasta_ID_Entusiasta = '$idEntusiasta'";
        }

        // executa a query
        if (mysqli_query($conn, $query)) {
            header("Location: perfilentusiasta.php");
        } else {
            echo "Erro ao editar o post: " . mysqli_error($conn);
        }
    }

}
?>
