<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Faunder";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("falha: ". $conn->connect_error);
    }

    $sql = "ALTER TABLE Entusiasta UNIQUE (Email_Entusiasta)";
?>