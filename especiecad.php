<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Post = $_POST['ID_Post'];
    $Descricao_Post = $_POST['Descricao_Post'];
    $Imagem_Post = $_POST['Imagem_Post'];
}
?>

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
        <textarea name="descricaoEspecie" id="descricaoEspecie" placeholder="Descrição" required><?php echo $Descricao_Post; ?></textarea><br>
        
        Imagem: <br>
        <?php if (!empty($Imagem_Post)): ?>
            <img src="data:image/png;base64,<?php echo $Imagem_Post; ?>" alt="Imagem da Espécie" style="max-width: 200px; border-radius: 10px;"><br>
        <?php endif; ?>
        <input type="hidden" name="Imagem_Post" value="<?php echo $Imagem_Post; ?>">

        <button type="submit">Validar Espécie</button>
    </form>    
</body>
</html>
