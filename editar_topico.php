<?php
// Verificar se o ID do fórum foi fornecido via GET
if (isset($_GET['id_forum'])) {
    // Recuperar o ID do fórum da URL
    $id_forum = $_GET['id_forum'];

    // Incluir o arquivo de conexão com o banco de dados
    include("conn.php");

    // Consulta SQL para recuperar os detalhes do fórum do banco de dados
    $sql = "SELECT Titulo_Forum, Descricao_Forum, Imagem_Capa FROM Forum WHERE ID_Forum = $id_forum";
    $result = $conn->query($sql);

    // Verificar se a consulta foi bem-sucedida
    if ($result->num_rows == 1) {
        // Extrair os detalhes do fórum do resultado da consulta
        $forum = $result->fetch_assoc();

        // Verificar se o usuário logado é o proprietário do fórum (você precisa implementar a lógica para verificar isso)
        if ($id_usuario_logado == $id_autor_forum) {
            // Exibir o formulário pré-preenchido para editar o fórum
?>
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editar Tópico do Fórum</title>
            </head>
            <body>

            <h1>Editar Tópico do Fórum</h1>

            <form action="processar_edicao_topico.php" method="post" enctype="multipart/form-data">
                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="titulo" value="<?php echo $forum['Titulo_Forum']; ?>"><br><br>

                <label for="descricao">Descrição:</label><br>
                <textarea id="descricao" name="descricao" rows="4" cols="50"><?php echo $forum['Descricao_Forum']; ?></textarea><br><br>

                <label for="imagem">Imagem de Capa:</label><br>
                <input type="file" id="imagem" name="imagem"><br><br>

                <input type="hidden" name="id_forum" value="<?php echo $id_forum; ?>">
                <input type="submit" value="Salvar Alterações">
            </form>

            </body>
            </html>
<?php
        } else {
            // Se o usuário não for o proprietário do fórum, exibir uma mensagem de erro ou redirecionar para uma página de erro
            echo "<p>Você não tem permissão para editar este fórum.</p>";
        }
    } else {
        // Se o fórum não for encontrado, redirecionar de volta para a página de tópicos do fórum
        header("Location: forum.php");
        exit(); // Certifique-se de sair do script após o redirecionamento
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Se o ID do fórum não foi fornecido na URL, redirecionar de volta para a página de tópicos do fórum
    header("Location: forum.php");
    exit(); // Certifique-se de sair do script após o redirecionamento
}
?>
