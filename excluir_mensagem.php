<?php
// Verificar se o ID da mensagem foi fornecido via GET
if (isset($_GET['id_mensagem'])) {
    // Recuperar o ID da mensagem da URL
    $id_mensagem = $_GET['id_mensagem'];

    // Incluir o arquivo de conexão com o banco de dados
    include("conn.php");

    // Verificar se o usuário logado é o autor da mensagem (você precisa implementar essa lógica)
    $sql = "SELECT fk_Entusiasta_ID_Entusiasta FROM Mensagem WHERE ID_Mensagem = $id_mensagem";
    $result = $conn->query($sql);

    // Verificar se a consulta foi bem-sucedida e se o usuário é o autor da mensagem
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($id_usuario_logado == $row['fk_Entusiasta_ID_Entusiasta']) {
            // Excluir a mensagem do banco de dados
            $sql_delete = "DELETE FROM Mensagem WHERE ID_Mensagem = $id_mensagem";
            if ($conn->query($sql_delete) === TRUE) {
                // Redirecionar de volta para a página de mensagens
                header("Location: mensagens.php");
                exit(); // Certifique-se de sair do script após o redirecionamento
            } else {
                echo "<p>Erro ao excluir a mensagem: " . $conn->error . "</p>";
            }
        } else {
            echo "<p>Você não tem permissão para excluir esta mensagem.</p>";
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
