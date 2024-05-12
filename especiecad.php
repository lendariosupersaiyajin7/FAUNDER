<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAUNDER</title>
</head>
<body>
    <form name="cadastroEspecie" id="caixa_formulario" method="post" action="especiecadphp.php">
        Nome Científico: <br>
        <input type="text" name="nomeCientificoEspecie" id="nomeCientificoEspecie" placeholder="Nome Científico" required><br>
        Nome Comum: <br>
        <input type="text" name="nomeComumEspecie" id="nomeComumEspecie" placeholder="Nome Comum" required><br>
        Data de Registro: <br>
        <input type="date" name="dataRegistroEspecie" id="dataRegistroEspecie" placeholder="Data de Registro" required><br>
        Descrição: <br>
        <textarea name="descricaoEspecie" id="descricaoEspecie" placeholder="Descrição" required></textarea><br>
        
        Imagem: <br>
        <input type="file" name="imagemEspecie" id="imagemEspecie" required accept="image/*"><br><br>
        <input type="submit" value="Registrar Espécie">
    </form>    
</body>
</html>

<script>

</script>
