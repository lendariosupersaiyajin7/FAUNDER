<?php
// Incluir o arquivo de conexão com o banco de dados
include("conn.php");

// Consulta SQL para selecionar todos os tópicos do fórum
$sql = "SELECT ID_Forum, Titulo_Forum, Descricao_Forum, DataCriacao_Forum, Imagem_Capa FROM Forum";
$result = $conn->query($sql);

// Verificar se a consulta retornou resultados
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum</title>
    <link rel="stylesheet" href="css/forum.css">
</head>
<body>

<h1>Fóruns</h1>

<?php
// Verificar se existem tópicos no fórum
if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir cada tópico     
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        if (!empty($row["Imagem_Capa"])) {
            echo "<img src='" . $row["Imagem_Capa"] . "' alt='Imagem de Capa' style='border-radius: 20px'>";
        }
        echo "<h2>" . $row["Titulo_Forum"] . "</h2>";
        echo "<p>" . $row["Descricao_Forum"] . "</p>";
        echo "<p>Data de Criação: " . $row["DataCriacao_Forum"] . "</p>";
        // Exibir a imagem de capa do grupo, se existir

        // Link para visualizar as mensagens do tópico
        echo "<a href='mensagens.php?id=" . $row["ID_Forum"] . "'>Ver Mensagens</a>";
        echo "<a href='editar_forum.php?id=" . $row["ID_Forum"] . "'><button>Editar Fórum</button></a>";
        echo "</div>";
        echo "<hr>";
    }
} else {
    echo "<p>Não há nenhum fórum criado.</p>";
}
// Fechar a conexão com o banco de dados
$conn->close();
?>

<!-- Botão para criar um novo tópico -->
<a href="criar_topico.php"><button>Criar Fórum</button></a>
</body>
</html>
