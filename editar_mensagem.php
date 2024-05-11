<?php
// Verificar se o ID da mensagem foi fornecido via GET
if (isset($_GET['id_mensagem'])) {
    // Recuperar o ID da mensagem da URL
    $id_mensagem = $_GET['id_mensagem'];

    // Incluir o arquivo de conexão com o banco de dados
    include("conn.php");

    // Consulta SQL para recuperar os detalhes da mensagem do banco de dados
    $sql = "SELECT * FROM Mensagem WHERE ID_Mensagem = $id_mensagem";
    $result = $conn->query($sql);

    // Verificar se a consulta foi bem-sucedida
    if ($result->num_rows == 1) {
        // Extrair os detalhes da mensagem do resultado da consulta
        $mensagem = $result->fetch_assoc();

        // Verificar se o usuário logado é o autor da mensagem (você precisa implementar essa lógica)
        if ($id_usuario_logado == $mensagem['fk_Entusiasta_ID_Entusiasta']) {
            // Exibir o formulário de edição da mensagem
?>
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="css/editar_mensagem.css">
                <title>Editar Mensagem</title>
            </head>
            <body>

            <h1>Editar Mensagem</h1>

            <form action="processa_edita_mensagem.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_mensagem" value="<?php echo $mensagem['ID_Mensagem']; ?>">
                <label for="conteudo">Conteúdo:</label><br>
                <textarea id="conteudo" name="conteudo" rows="4" cols="50"><?php echo $mensagem['Conteudo_Mensagem']; ?></textarea><br>
                <div class="file-upload">
                    <label for="imagem">Anexar Imagem:</label><br>
                    <input type="file" id="imagem" name="imagem" onchange="previewImage(event)"><br><br><br>
                </div>
                <img id="preview-image" src="#" alt="Imagem escolhida">
                <button id="remove-image" type="button" onclick="removeImage()">Remover Imagem</button><br><br><br>
                <input type="submit" value="Salvar Alterações">
            </form>

            <script src="js/imagem.js"></script>

            </body>
            </html>
<?php
        } else {
            // Se o usuário não for o autor da mensagem, exibir uma mensagem de erro
            echo "<p>Você não tem permissão para editar esta mensagem.</p>";
        }
    } else {
        // Se não houver mensagem com o ID fornecido, exibir uma mensagem de erro
        echo "<p>Mensagem não encontrada.</p>";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Se o ID da mensagem não foi fornecido na URL, exibir uma mensagem de erro
    echo "<p>Erro: ID da mensagem não fornecido.</p>";
}
?>
