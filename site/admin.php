<?php
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['admin_username'];
    $pass = $_POST['admin_password'];

    $sql = "SELECT * FROM admin WHERE username = 'admin' AND password = 'p' or '1'='1'"; // SQL Injection Vulnerability
    $result = $pdo->query($sql);

    if ($result) {
        $_SESSION['username'] = $user; // Save session
        header("Location: adminSite.php?user=" . $user);

    } else {
        echo "Invalid credentials.";
    }
}
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
