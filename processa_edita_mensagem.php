<?php
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o ID da mensagem foi fornecido
    if (isset($_POST['id_mensagem'])) {
        // Recuperar os dados do formulário
        $id_mensagem = $_POST['id_mensagem'];
        $novo_conteudo = $_POST['conteudo'];

        // Verificar se foi enviada uma nova imagem
        if ($_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
            // Diretório onde as imagens serão armazenadas
            $diretorio_destino = "caminho/para/o/diretorio/";

            // Obter o nome e o caminho do arquivo temporário
            $nome_arquivo_temporario = $_FILES['imagem']['tmp_name'];
            $nome_arquivo = basename($_FILES['imagem']['name']);
            $caminho_arquivo = $diretorio_destino . $nome_arquivo;

            // Mover o arquivo temporário para o diretório de destino
            if (move_uploaded_file($nome_arquivo_temporario, $caminho_arquivo)) {
                // Atualizar o banco de dados com o novo conteúdo e caminho da imagem
                $sql = "UPDATE Mensagem SET Conteudo_Mensagem = '$novo_conteudo', Imagem_Mensagem = '$caminho_arquivo' WHERE ID_Mensagem = $id_mensagem";

                // Conectar ao banco de dados e executar a consulta
                include("conn.php");
                if ($conn->query($sql) === TRUE) {
                    // Redirecionar o usuário de volta para a página mensagens.php
                    header("Location: mensagens.php");
                    exit; // Certifique-se de encerrar a execução do script após o redirecionamento
                } else {
                    echo "Erro ao atualizar a mensagem: " . $conn->error;
                }
                $conn->close();
            } else {
                echo "Erro ao mover o arquivo para o diretório de destino.";
            }
        } else {
            // Se nenhuma nova imagem foi enviada, apenas atualizar o conteúdo da mensagem
            $sql = "UPDATE Mensagem SET Conteudo_Mensagem = '$novo_conteudo' WHERE ID_Mensagem = $id_mensagem";

            // Conectar ao banco de dados e executar a consulta
            include("conn.php");
            if ($conn->query($sql) === TRUE) {
                // Redirecionar o usuário de volta para a página mensagens.php
                header("Location: mensagens.php");
                exit; // Certifique-se de encerrar a execução do script após o redirecionamento
            } else {
                echo "Erro ao atualizar a mensagem: " . $conn->error;
            }
            $conn->close();
        }
    } else {
        echo "Erro: ID da mensagem não fornecido.";
    }
} else {
    echo "Erro: Este script deve ser acessado via método POST.";
}
?>
