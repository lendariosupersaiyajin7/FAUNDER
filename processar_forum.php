<?php

// Variável para verificar se o formulário deve ser exibido
$exibirFormulario = true;

// Mensagem de alerta caso o título já exista
$alerta = "";

session_start();
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir o arquivo de conexão com o banco de dados
    include("conn.php");

    // Recuperar os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    // Verificar se o título do fórum já existe no banco de dados
    $check_query = "SELECT * FROM Forum WHERE Titulo_Forum = '$titulo'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $alerta = "Já existe um fórum com esse título. Por favor, escolha outro.";
        // Se o título já existir, não precisamos mais exibir o formulário
        $exibirFormulario = false;
    } else {
        // Verificar se foi enviado um arquivo
        if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
            // Diretório onde a imagem será armazenada
            $diretorio = "imgs/";

            // Nome do arquivo
            $nome_arquivo = basename($_FILES["imagem"]["name"]);

            // Caminho completo do arquivo no servidor
            $caminho_arquivo = $diretorio . $nome_arquivo;

            // Mover o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_arquivo)) {

                // Inserir os dados do tópico no banco de dados, incluindo o ID do usuário da sessão
                $sql = "INSERT INTO Forum (Titulo_Forum, Descricao_Forum, Imagem_Capa, fk_Entusiasta_ID_Entusiasta) VALUES ('$titulo', '$descricao', '$caminho_arquivo', '{$_SESSION['idEntusiasta']}')";

                if ($conn->query($sql) === TRUE) {
                    // Redirecionar para a página do fórum
                    header("Location: forum.php");
                    exit;
                } else {
                    echo "Erro ao criar tópico: " . $conn->error;
                }
            } else {
                echo "<script>alert('Erro ao fazer upload da imagem.');</script>";
            }
        } else {
            // Caso não tenha sido enviado um arquivo, inserir os dados do tópico sem imagem
            $sql = "INSERT INTO Forum (Titulo_Forum, Descricao_Forum, fk_Entusiasta_ID_Entusiasta) VALUES ('$titulo', '$descricao', '{$_SESSION['idEntusiasta']}')";

            if ($conn->query($sql) === TRUE) {
                // Redirecionar para a página do fórum
                header("Location: forum.php");
                exit;
            } else {
                echo "Erro ao criar tópico: " . $conn->error;
            }
        }
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/criar_forum.css">
    <title>Criar Fórum</title>
</head>
<body>

<h1>Criar Novo Fórum</h1>

<?php if ($alerta): ?>
    <script>alert("<?php echo $alerta; ?>");</script>
<?php endif; ?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
    <label for="titulo">Título do Fórum:</label><br>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="descricao">Descrição do Fórum:</label><br>
    <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

    <div class="file-upload">
        <label for="imagem">Anexar Imagem:</label><br>
        <input type="file" id="imagem" name="imagem" onchange="previewImage(event)"><br><br><br>
    </div>
    <img id="preview-image" src="#" alt="Imagem escolhida">
    <button id="remove-image" type="button" onclick="removeImage()">Remover Imagem</button><br><br><br>

    <input type="submit" value="Criar Fórum">
</form>

<script src="js/imagem.js"></script>

</body>
</html>
