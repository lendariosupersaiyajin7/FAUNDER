<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/criar_forum.css">
    <title>Criar Fórum</title>
</head>
<link rel="stylesheet" href="cadastros.css">
<body>

<h1>Criar Novo Fórum</h1>

<form action="processar_forum.php" method="POST" enctype="multipart/form-data" id='caixa_formulario'>
    <label for="titulo">Título do Fórum:</label><br>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="descricao">Descrição do Fórum:</label><br>
    <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

    <div class="file-upload" id="caixa_formulario">
        <label for="imagem">Anexar Imagem:</label><br>
        <input type="file" name="imagem" onchange="previewImage(event)"><br><br><br>
    </div>
    <img id="preview-image" src="#" alt="Imagem escolhida">
    <button id="botao4" type="button" onclick="removeImage()">Remover Imagem</button><br><br><br>

    <input type="submit" value="Criar Fórum" id="botao3">
</form>

<script src="js/imagem.js"></script>

</body>
</html>
