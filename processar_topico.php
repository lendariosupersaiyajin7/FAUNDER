<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir o arquivo de conexão com o banco de dados
    include("conn.php");

    // Recuperar os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    // Verificar se foi enviado um arquivo
    if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
        // Diretório onde a imagem será armazenada
        $diretorio = "imagens/";

        // Nome do arquivo
        $nome_arquivo = basename($_FILES["imagem"]["name"]);

        // Caminho completo do arquivo no servidor
        $caminho_arquivo = $diretorio . $nome_arquivo;

        // Mover o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_arquivo)) {
            // Inserir os dados do tópico no banco de dados, incluindo o caminho da imagem
            $sql = "INSERT INTO Forum (Titulo_Forum, Descricao_Forum, Imagem_Capa) VALUES ('$titulo', '$descricao', '$caminho_arquivo')";

            if ($conn->query($sql) === TRUE) {
                // Redirecionar para a página do fórum
                header("Location: forum.php");
                exit;
            } else {
                echo "Erro ao criar tópico: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        // Caso não tenha sido enviado um arquivo, inserir os dados do tópico sem imagem
        $sql = "INSERT INTO Forum (Titulo_Forum, Descricao_Forum) VALUES ('$titulo', '$descricao')";

        if ($conn->query($sql) === TRUE) {
            // Redirecionar para a página do fórum
            header("Location: forum.php");
            exit;
        } else {
            echo "Erro ao criar tópico: " . $conn->error;
        }
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Se o formulário não foi enviado, redirecionar para a página de criação de tópico
    header("Location: criar_topico.php");
    exit;
}
?>
