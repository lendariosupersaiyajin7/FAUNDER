<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tópico</title>
</head>
<body>

<h1>Criar Novo Tópico</h1>

<form action="processar_topico.php" method="post" enctype="multipart/form-data">
    <label for="titulo">Título do Tópico:</label><br>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="descricao">Descrição do Tópico:</label><br>
    <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

    <label for="imagem">Anexar Imagem:</label><br>
    <input type="file" id="imagem" name="imagem"><br><br>

    <input type="submit" value="Criar Tópico">
</form>

</body>
</html>
