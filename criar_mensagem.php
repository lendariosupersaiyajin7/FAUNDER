<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Mensagem</title>
</head>
<body>

<h1>Criar Nova Mensagem</h1>

<form action="processar_mensagem.php" method="POST" enctype="multipart/form-data">
    <label for="conteudo">Conteúdo da Mensagem:</label><br>
    <textarea id="conteudo" name="conteudo" rows="4" cols="50"></textarea><br>
    
    <label for="imagem">Anexar Imagem (opcional):</label><br>
    <input type="file" id="imagem" name="imagem"><br><br>

    <button type="submit">Enviar Mensagem</button>
</form>

</body>
</html>
