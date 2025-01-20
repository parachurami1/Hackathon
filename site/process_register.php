<!-- process_register.php -->
<?php
$servername = "db";
$username = "root";
$password = "root_password";
$dbname = "hackathon1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')"; // No input sanitization
    if ($conn->query($sql) === TRUE) {
        // echo "Registration successful.";
        header("Location: login.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>