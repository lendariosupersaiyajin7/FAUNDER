<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <h1>POST</h1>
    
    <form action="postcreatephp.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="criar">
        <label>Descrição:</label>
        <input type="text" name="descricao_post"><br>
        <label>Imagem:</label>
        <input type="file" name="imagem_post"><br>
        <button type="submit">Criar Post</button>
    </form>

    <hr>
</body>
</html>
