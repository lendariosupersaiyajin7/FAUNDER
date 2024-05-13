<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAUNDER</title>
</head>
<body>
    <form action="especiecadphp.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="acaoCriarEspecie" value="criarEspecie">
        Nome Científico: <br>
        <input type="text" name="nomeCientificoEspecie" id="nomeCientificoEspecie" placeholder="Nome Científico" required><br>
        Nome Comum: <br>
        <input type="text" name="nomeComumEspecie" id="nomeComumEspecie" placeholder="Nome Comum" required><br>
        Data de Registro: <br>
        <input type="date" name="dataRegistroEspecie" id="dataRegistroEspecie" placeholder="Data de Registro" required><br>
        Descrição: <br>
        <textarea name="descricaoEspecie" id="descricaoEspecie" placeholder="Descrição" required></textarea><br>
        
        Imagem: <br>
        <input type="file" name="imagem_Especie"><br><br>
        <button type="submit">Registrar Espécie</button>
    </form>    
</body>
</html>

<script>

</script>
