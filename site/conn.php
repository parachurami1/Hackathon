<?php
    session_start();
    $servername = "db"; // Service name of the database container
    $username = "root";
    $password = "root_password"; // Password set in docker-compose.yml
    $dbname = "hackathon1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
