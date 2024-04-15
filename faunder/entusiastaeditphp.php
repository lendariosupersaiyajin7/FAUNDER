<?php
// Verifica se o ID do entusiasta foi passado corretamente
if (isset($_GET["id"])) {
    // Inclua o arquivo de conexão com o banco de dados
    include("conn.php");

    // Obtém o ID do entusiasta da URL
    $ID_Entusiasta = $_GET['id'];

    // Obtém os dados do formulário via método POST
    $Nome_Entusiasta = $_POST['Nome_Entusiasta'];
    $Apelido_Entusiasta = $_POST['Apelido_Entusiasta'];
    $Email_Entusiasta = $_POST['Email_Entusiasta'];
    $Senha_Entusiasta = $_POST['Senha_Entusiasta'];
    $DataNasci_Entusiasta = $_POST['DataNasci_Entusiasta'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE Entusiasta SET Nome_Entusiasta = '$Nome_Entusiasta', Apelido_Entusiasta = '$Apelido_Entusiasta', Email_Entusiasta = '$Email_Entusiasta', Senha_Entusiasta = '$Senha_Entusiasta', DataNasci_Entusiasta = '$DataNasci_Entusiasta' WHERE ID_Entusiasta = '$ID_Entusiasta'";
    
    // Executa a consulta SQL
    $result = $conn->query($sql);

    // Verifica se a consulta foi bem-sucedida
    if ($result === TRUE) {
        // Redireciona de volta para a página de lista de entusiastas
        header("Location: entusiasta_lst.php");
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
