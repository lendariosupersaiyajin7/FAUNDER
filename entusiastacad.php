<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelas.css">
    <title>FAUNDER</title>
</head>
<body>
    <form name="cadastroEntusiasta" id="caixa_formulario" method="post" action="entusiastacadphp.php">
        Nome: <br>
        <input type="text" name="nomeEntusiasta" id="nomeEntusiasta" placeholder="Nome: " required><br>
        Apelido: <br>
        <input type="text" name="apelidoEntusiasta" id="apelidoEntusiasta"placeholder="Apelido: " required><br>
        E-mail <br>
        <input type="email" name="emailEntusiasta" id="emailEntusiasta"placeholder="Email: " required><br>
        Senha <br>
        <input type="password" name="senhaEntusiasta" id="senhaEntusiasta" placeholder="Senha: " required><br>
        Data de Nascimento <br>
        <input type="date" name="dataNasciEntusiasta" id="dataNasciEntusiasta"placeholder="Data de nascimento: " required><br>

        <input type="submit" value="Realizar Cadastro">
    </form>    
    
</body>
</html>