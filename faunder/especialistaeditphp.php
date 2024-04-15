<?php
// Verifica se o ID do especialista foi passado corretamente
if (isset($_GET["id"])) {
    // Inclui o arquivo de conexão com o banco de dados
    include("conn.php");

    // Obtém o ID do especialista da URL
    $ID_Especialista = $_GET['id'];

    // Obtém os dados do formulário via método POST
    $Nome_Especialista = $_POST['Nome_Especialista'];
    $Apelido_Especialista = $_POST['Apelido_Especialista'];
    $Email_Especialista = $_POST['Email_Especialista'];
    // Não será atualizada a senha diretamente via este script por motivos de segurança
    $DataNasci_Especialista = $_POST['DataNasci_Especialista'];
    $Comprovante_Especialista = $_POST['Comprovante_Especialista'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE Especialista SET Nome_Especialista = '$Nome_Especialista', Apelido_Especialista = '$Apelido_Especialista', Email_Especialista = '$Email_Especialista', DataNasci_Especialista = '$DataNasci_Especialista', Comprovante_Especialista = '$Comprovante_Especialista' WHERE ID_Especialista = '$ID_Especialista'";
    
    // Executa a consulta SQL
    $result = $conn->query($sql);

    // Verifica se a consulta foi bem-sucedida
    if ($result === TRUE) {
        // Redireciona de volta para a página de lista de especialistas
        header("Location: especialista_lst.php");
        exit(); // Encerra o script após o redirecionamento
    } else {
        // Em caso de erro na consulta SQL
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID do especialista não especificado.";
}
?>
