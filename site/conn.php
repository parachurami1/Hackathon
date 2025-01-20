<?php
    session_start();
    $servername = getenv('DB_SERVER') ?: 'db'; // Use 'db' as default, as that's the service name in Docker Compose
    $username = getenv('MYSQL_USER') ?: 'root'; // Default to root if not set
    $password = getenv('MYSQL_PASSWORD') ?: 'root_password'; // Default password, be sure to set in the environment
    $dbname = getenv('MYSQL_DATABASE') ?: 'hackathon1'; // Default database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
