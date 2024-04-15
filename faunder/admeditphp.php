<?php
// Verifica se o ID do entusiasta foi passado corretamente
if (isset($_GET["id"])) {
    // Inclua o arquivo de conexão com o banco de dados
    include("conn.php");

    // Obtém o ID do entusiasta da URL
    $ID_ADM = $_GET['id'];

    // Obtém os dados do formulário via método POST
    $Nome_ADM = $_POST['Nome_ADM'];
    $Apelido_ADM = $_POST['Apelido_ADM'];
    $Email_ADM = $_POST['Email_ADM'];
    $Senha_ADM = $_POST['Senha_ADM'];
    $SenhaEpicaSecreta = $_POST['SenhaEpicaSecreta_ADM'];
    $DataNasci_ADM = $_POST['DataNasci_ADM'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE ADM SET Nome_ADM = '$Nome_ADM', Apelido_ADM = '$Apelido_ADM', Email_ADM = '$Email_ADM', Senha_ADM = '$Senha_ADM', SenhaEpicaSecreta_ADM = '$SenhaEpicaSecreta', DataNasci_ADM = '$DataNasci_ADM' WHERE ID_ADM = '$ID_ADM'";
    
    // Executa a consulta SQL
    $result = $conn->query($sql);

    // Verifica se a consulta foi bem-sucedida
    if ($result === TRUE) {
        // Redireciona de volta para a página de lista de entusiastas
        header("Location: adm_lst.php");
        exit(); // Encerra o script após o redirecionamento
    } else {
        // Em caso de erro na consulta SQL
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID do entusiasta não especificado.";
}
?>
