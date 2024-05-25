<?php
session_start();

// Verificar se o especialista está autenticado
if (!isset($_SESSION['idEspecialista'])) {
    echo "Erro: Usuário não autenticado como especialista.";
    exit;
}

include("conn.php");

// Consulta SQL para selecionar todos os fóruns existentes
$sql = "SELECT f.ID_Forum, f.Titulo_Forum, f.Descricao_Forum, f.Data_Criacao_Forum, f.Imagem_Capa, e.Nome_Entusiasta 
        FROM Forum f 
        INNER JOIN Entusiasta e ON f.fk_Entusiasta_ID_Entusiasta = e.ID_Entusiasta";

$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum Especialista</title>
    <link rel="stylesheet" href="css/forum-especialista.css">
</head>
<body>

<h1>Fóruns Disponíveis</h1>

<?php
// Verificar se existem fóruns disponíveis
if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir cada fórum
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        if (!empty($row["Imagem_Capa"])) {
            echo "<img src='" . $row["Imagem_Capa"] . "' alt='Imagem de Capa' style='border-radius: 20px'>";
        }
        echo "<h2>" . $row["Titulo_Forum"] . "</h2>";
        echo "<p>" . $row["Descricao_Forum"] . "</p>";
        echo "<p>Criado por: " . $row["Nome_Entusiasta"] . "</p>";
        echo "<p>Data de Criação: " . $row["Data_Criacao_Forum"] . "</p>";

        // Link para visualizar os posts do fórum
        echo "<a href='publicacoes.php?id=" . $row["ID_Forum"] . "'>Ver Posts</a>";

        echo "</div>";
        echo "<hr>";
    }
} else {
    echo "<p>Não há fóruns disponíveis.</p>";
}
// Fechar a conexão com o banco de dados
$conn->close();
?>

</body>
</html>
