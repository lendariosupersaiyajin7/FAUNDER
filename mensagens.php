<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/messages.css">
    <title>Mensagens do Fórum</title>
</head>
<body>

<h1>Mensagens do Fórum</h1>
<?php
// Incluir o arquivo de conexão com o banco de dados
include("conn.php");

// Iniciar a sessão
session_start();

// Verificar se o ID do usuário está presente na sessão
if (isset($_SESSION['id_usuario'])) {
    $id_usuario_logado = $_SESSION['id_usuario'];
}

// Consulta SQL para selecionar todas as mensagens do banco de dados
$sql = "SELECT * FROM Mensagem";
$result = $conn->query($sql);

// Verificar se há mensagens no banco de dados
if ($result->num_rows > 0) {
    // Loop através de todas as mensagens e exibi-las
    while ($row = $result->fetch_assoc()) {
        echo "<div class='mensagem'>"; // Adicionando a classe 'mensagem' aqui
        echo "<p><strong>ID da Mensagem:</strong> " . $row['ID_Mensagem'] . "</p>";
        echo "<p><strong>Conteúdo:</strong> " . $row['Conteudo_Mensagem'] . "</p>";
        if (!empty($row['Imagem_Mensagem'])) {
            echo "<p><strong>Imagem:</strong> <img src='" . $row['Imagem_Mensagem'] . "' alt='Imagem da Mensagem'></p>";
        }
        // Verificar se o usuário logado é o autor da mensagem
        //if ($id_usuario_logado == $row['fk_Entusiasta_ID_Entusiasta']) {
            // Se sim, exibir links para editar e excluir a mensagem
        echo "<p><a href='editar_mensagem.php?id_mensagem=" . $row['ID_Mensagem'] . "'>Editar</a> | <a href='excluir_mensagem.php?id_mensagem=" . $row['ID_Mensagem'] . "'>Excluir</a></p>";
        //}
        echo "</div>";
    }
} else {
    echo "<p>Não há mensagens para exibir.</p>";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>


<!-- Botão para criar uma nova mensagem -->
<a href="criar_mensagem.php"><button>Criar Mensagem</button></a>

</body>
</html>
