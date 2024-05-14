<?php
// VALIDAÇÃO (INSERT) DE ESPECIE
include("conn.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acaoCriarEspecie = $_POST['acaoCriarEspecie'];

    if ($acaoCriarEspecie == "criarEspecie") {
        $nomeCientificoEspecie = $_POST["nomeCientificoEspecie"];
        $nomeComumEspecie = $_POST["nomeComumEspecie"];
        $dataRegistroEspecie = $_POST["dataRegistroEspecie"];
        $descricaoEspecie = $_POST["descricaoEspecie"];
        $imagem_Especie = $_FILES["imagem_Especie"]["tmp_name"];
        $nome_imagem_Especie = $_FILES['imagem_Especie']['name'];

        // verifica se foi enviada uma imagem
        if ($imagem_Especie) {
            $conteudo_imagem_Especie = addslashes(file_get_contents($imagem_Especie));
            $query = "INSERT INTO Especie (NomeCientifico_Especie, NomeComum_Especie, DataRegistro_Especie, Descricao_Especie, Imagem_Especie) VALUES('$nomeCientificoEspecie', '$nomeComumEspecie', '$dataRegistroEspecie', '$descricaoEspecie', '$conteudo_imagem_Especie')";
        } else {
            $query = $imagem_Especie = null;
        }
        if (mysqli_query($conn, $query)) {
            header("especie_lst.php");
        } else {
            echo "Erro ao registrar especie: " . mysqli_error($conn);
        }
    }
    }

?>