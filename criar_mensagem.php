<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/criar_mensagem.css">
    <title>Criar Mensagem</title>
</head>
<body>

<h1>Criar Nova Mensagem</h1>

<form action="processar_mensagem.php" method="POST" enctype="multipart/form-data">
    <label for="conteudo">Conteúdo da Mensagem:</label><br>
    <textarea id="conteudo" name="conteudo" rows="4" cols="50"></textarea><br>
    <div class="file-upload">
        <label for="imagem">Anexar Imagem:</label><br>
        <input type="file" id="imagem" name="imagem" onchange="previewImage(event)"><br><br><br>
    </div>
    <img id="preview-image" src="#" alt="Imagem escolhida">
    <button id="remove-image" type="button" onclick="removeImage()">Remover Imagem</button><br><br><br>
    <input type="submit" value="Enviar Mensagem">
</form>

<script src="js/imagem.js"></script>

</body>
</html>
