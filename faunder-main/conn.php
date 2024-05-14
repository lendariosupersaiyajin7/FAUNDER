<?php
// CONEXÃO COM O BANCO DE DADOS 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "EXP";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("falha: ". $conn->connect_error);
    }
?>