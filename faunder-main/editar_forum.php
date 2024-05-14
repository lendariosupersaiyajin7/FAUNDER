<?php
// Incluir o arquivo de conexão com o banco de dados
include("conn.php");

// Variável para verificar se o formulário deve ser exibido
$exibirFormulario = true;

// Mensagem de alerta caso o título já exista
$alerta = "";

// Verificar se o parâmetro ID foi passado na URL
if(isset($_GET['id'])) {
    // Receber o ID do fórum a ser editado
    $id_forum = $_GET['id'];
    
    // Consultar o banco de dados para obter os detalhes do fórum
    $sql = "SELECT Titulo_Forum, Descricao_Forum, Imagem_Capa FROM Forum WHERE ID_Forum = $id_forum";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir o formulário de edição do fórum
        $forum = $result->fetch_assoc();
        $titulo_forum = $forum['Titulo_Forum'];
        $descricao_forum = $forum['Descricao_Forum'];
        $imagem_forum = $forum['Imagem_Capa'];
    } else {
        // Se não houver resultados, redirecionar para a página principal do fórum
        header("Location: forum.php");
        exit();
    }
} else {
    // Se o parâmetro ID não foi passado, redirecionar para a página principal do fórum
    header("Location: forum.php");
    exit();
}

// Verificar se o formulário de edição foi enviado
if(isset($_POST['submit'])) {
    // Receber os dados do formulário
    $novo_titulo = $_POST['titulo'];
    $nova_descricao = $_POST['descricao'];

    // Verificar se o novo título é diferente do título atual do fórum
    if ($novo_titulo != $titulo_forum) {
        // Verificar se o novo título já existe no banco de dados, excluindo o próprio fórum atual da verificação
        $check_query = "SELECT * FROM Forum WHERE Titulo_Forum = '$novo_titulo' AND ID_Forum != $id_forum";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            $alerta = "Já existe um fórum com esse título. Por favor, escolha outro.";
            // Se o título já existir, não precisamos mais exibir o formulário
            $exibirFormulario = false;
        }
    }

    // Se ainda pudermos exibir o formulário (sem alerta), podemos processar a atualização
    if ($exibirFormulario) {
        // Atualizar os detalhes do fórum no banco de dados
        $sql_update = "UPDATE Forum SET Titulo_Forum = '$novo_titulo', Descricao_Forum = '$nova_descricao' WHERE ID_Forum = $id_forum";
        if ($conn->query($sql_update) === TRUE) {
            // Verificar se um novo arquivo foi enviado
            if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
                // Diretório onde a imagem será armazenada
                $diretorio = "imgs/";
                // Nome do arquivo
                $nome_arquivo = basename($_FILES["imagem"]["name"]);
                // Caminho completo do arquivo no servidor
                $caminho_arquivo = $diretorio . $nome_arquivo;
                // Mover o arquivo para o diretório de destino
                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_arquivo)) {
                    // Atualizar o caminho da imagem no banco de dados
                    $sql_update_imagem = "UPDATE Forum SET Imagem_Capa = '$caminho_arquivo' WHERE ID_Forum = $id_forum";
                    if ($conn->query($sql_update_imagem) === TRUE) {
                        // Redirecionar de volta para a página do fórum após a edição
                        header("Location: forum.php");
                        exit();
                    } else {
                        echo "Erro ao atualizar a imagem do fórum: " . $conn->error;
                    }
                } else {
                    echo "Erro ao fazer upload da nova imagem.";
                }
            } else {
                // Redirecionar de volta para a página do fórum após a edição
                header("Location: forum.php");
                exit();
            }
        } else {
            echo "Erro ao atualizar o fórum: " . $conn->error;
        }
    }
}

// Verificar se o botão de exclusão foi clicado
if(isset($_POST['delete'])) {
    // Excluir o fórum do banco de dados
    $sql_delete = "DELETE FROM Forum WHERE ID_Forum = $id_forum";
    if ($conn->query($sql_delete) === TRUE) {
        // Redirecionar para a página principal do fórum após a exclusão
        header("Location: forum.php");
        exit();
    } else {
        echo "Erro ao excluir o fórum: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editar_forum.css">
    <title>Editar Fórum</title>
</head>
<body>

<h1>Editar Fórum</h1>

<?php if ($alerta): ?>
    <script>alert("<?php echo $alerta; ?>");</script>
<?php endif; ?>

<?php?>
<form method="POST" enctype="multipart/form-data">
    <label for="titulo">Título do Fórum:</label><br>
    <input type="text" id="titulo" name="titulo" value="<?php echo $titulo_forum; ?>"><br><br>
    <label for="descricao">Descrição do Fórum:</label><br>
    <textarea id="descricao" name="descricao"><?php echo $descricao_forum; ?></textarea><br><br>
    
    <div class="file-upload">
        <label for="imagem">Alterar imagem do fórum:</label><br>
        <input type="file" id="imagem" name="imagem" onchange="previewImage(event)"><br><br><br>
    </div>
    <img id="preview-image" src="#" alt="Imagem escolhida">
    <button id="remove-image" type="button" onclick="removeImage()">Remover Imagem</button><br><br><br>

    <br><br>
    <button type="submit" name="submit">Salvar Alterações</button>
</form>
<?php?>

<script src="js/imagem.js"></script>

<!-- Formulário para exclusão do fórum -->
<form method="POST">
    <button type="submit" name="delete" onclick="return confirm('Tem certeza que deseja excluir este fórum?')">Excluir Fórum</button>
</form>

</body>
</html>
