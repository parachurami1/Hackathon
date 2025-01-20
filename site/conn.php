<?php
    session_start();
    $servername = getenv("DB_HOST"); // Service name of the database container
    $username = getenv('DB_USER');
    $password = getenv('DB_PASSWORD'); // Password set in docker-compose.yml
    $dbname = getenv('DB_NAME');

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>