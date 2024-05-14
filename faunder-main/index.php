<?php
    echo "tá funcionando";

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'Faunder';

    $conn = new mysquli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("falha". $conn->connect_error);
    }
    echo "conexao ok";
?>