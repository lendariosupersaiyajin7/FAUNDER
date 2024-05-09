<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir o arquivo de conexão com o banco de dados
    include("conn.php");

    // Obter os dados do formulário
    $conteudo = $_POST['conteudo'];
    
    // Verificar se uma imagem foi enviada
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Caminho onde a imagem será armazenada no servidor
        $caminho_imagem = 'caminho/para/armazenar/a/imagem/' . $_FILES['imagem']['name'];

        // Mover a imagem para o diretório de destino
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem);
    } else {
        // Caso contrário, definir o caminho da imagem como NULL
        $caminho_imagem = NULL;
    }

    // Preparar a consulta SQL para inserir a nova mensagem no banco de dados
    $sql = "INSERT INTO Mensagem (Conteudo_Mensagem, Imagem_Mensagem, DataCriacao_Mensagem, fk_Entusiasta_ID_Entusiasta, fk_Forum_ID_Forum) VALUES (?, ?, NOW(), ?, ?)";
    
    // Preparar a instrução SQL
    $stmt = $conn->prepare($sql);
    
    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Vincular os parâmetros e executar a consulta
        $stmt->bind_param("ssii", $conteudo, $caminho_imagem, $id_entusiasta, $id_forum); // Substitua $id_entusiasta e $id_forum pelos valores apropriados
        $stmt->execute();
        
        // Verificar se a inserção foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            // Redirecionar o usuário de volta para a página de mensagens
            header("Location: mensagens.php");
            exit;
        } else {
            // Se a inserção falhar, exibir uma mensagem de erro
            echo "Erro ao inserir a mensagem no banco de dados.";
        }
        
        // Fechar a instrução SQL
        $stmt->close();
    } else {
        // Se a preparação da consulta falhar, exibir uma mensagem de erro
        echo "Erro ao preparar a consulta SQL.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Se o formulário não foi enviado, redirecionar o usuário de volta para a página de mensagens
    header("Location: mensagens.php");
    exit;
}
?>
