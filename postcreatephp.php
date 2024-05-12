<?php
session_start();

if (!isset($_SESSION['idEntusiasta'])) {
    echo "Erro: Usuário não autenticado.";
    exit;
}

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];

    if ($acao == "criar") {
        $data_post = date('Y-m-d'); 
        $descricao_post = $_POST['descricao_post'];
        $imagem_post = $_FILES['imagem_post']['tmp_name'];
        $nome_imagem = $_FILES['imagem_post']['name'];

        // verifica se foi enviada uma imagem
        if ($imagem_post) {
            $conteudo_imagem = addslashes(file_get_contents($imagem_post));
            $query = "INSERT INTO Post (Data_Post, Descricao_Post, Imagem_Post, fk_Entusiasta_ID_Entusiasta) VALUES ('$data_post', '$descricao_post', '$conteudo_imagem', '{$_SESSION['idEntusiasta']}')";
        } else {
            $query = "INSERT INTO Post (Data_Post, Descricao_Post, fk_Entusiasta_ID_Entusiasta) VALUES ('$data_post', '$descricao_post', '{$_SESSION['idEntusiasta']}')";
        }
        if (mysqli_query($conn, $query)) {
            header("perfilentusiasta.php");
        } else {
            echo "Erro ao criar o post: " . mysqli_error($conn);
        }
    }

}
?>
