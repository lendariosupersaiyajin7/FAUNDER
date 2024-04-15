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

<script>
        document.getElementById('caixa_formulario').addEventListener('submit', function(event) {
            var dataNascimento = document.getElementById('dataNasciEntusiasta').value;
            var senha = document.getElementById('senhaEntusiasta').value;

            var dataRegex = /^(19\d\d|200[0-6])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/;
            var senhaRegex = /^.{8,}$/;

            var hoje = new Date();
            var dataMinima = new Date(hoje.getFullYear() - 18, hoje.getMonth(), hoje.getDate());

            var nascimento = new Date(dataNascimento);
            if (!dataRegex.test(dataNascimento) || nascimento > dataMinima) {
                alert("Você deve ter pelo menos 18 anos para se cadastrar.");
                event.preventDefault(); 
            }

            if (!senhaRegex.test(senha)) {
                alert("A senha deve ter pelo menos 8 caracteres.");
                event.preventDefault();
            }
        });
    </script>