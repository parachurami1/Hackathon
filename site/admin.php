<?php
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['admin_username'];
    $pass = $_POST['admin_password'];

    $sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'"; // SQL Injection Vulnerability
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user; // Save session
        header("Location: adminSite.php?user=" . $user);

    } else {
        echo "Invalid credentials.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Page</h1>
    </header>
    <main>
        <form action="" method="POST">
            <label for="admin_username">Admin Username:</label>
            <input type="text" id="admin_username" name="admin_username" required>

            <label for="admin_password">Admin Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>

            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>
