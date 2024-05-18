<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acaoCriarEspecie = $_POST['acaoCriarEspecie'];

    if ($acaoCriarEspecie == "criarEspecie") {
        // Recupera os dados do formulário
        $nomeCientificoEspecie = $_POST["nomeCientificoEspecie"];
        $nomeComumEspecie = $_POST["nomeComumEspecie"];
        $dataRegistroEspecie = $_POST["dataRegistroEspecie"];
        $descricaoEspecie = $_POST["descricaoEspecie"];
        
        // Verifica se a imagem foi enviada e a processa
        if (isset($_FILES["Imagem_Post"]) && $_FILES["Imagem_Post"]["error"] == UPLOAD_ERR_OK) {
            $imagemPost = file_get_contents($_FILES["Imagem_Post"]["tmp_name"]);
        } elseif (isset($_POST['Imagem_Post'])) {
            $imagemPost = base64_decode($_POST['Imagem_Post']);
        } else {
            $imagemPost = null; // Ou defina uma imagem padrão
        }

        // Insere os dados na tabela de espécies, incluindo a imagem do post
        $query = "INSERT INTO Especie (NomeCientifico_Especie, NomeComum_Especie, DataRegistro_Especie, Descricao_Especie, Imagem_Especie) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $nomeCientificoEspecie, $nomeComumEspecie, $dataRegistroEspecie, $descricaoEspecie, $imagemPost);
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: especie_lst.php");
            exit(); // Adicionando a função exit() para interromper o script após redirecionar
        } else {
            echo "Erro ao registrar espécie: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>
