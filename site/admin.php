<?php
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['admin_username'];
    $pass = $_POST['admin_password'];

    $sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'"; // SQL Injection Vulnerability
    $result = $pdo->query($sql);

    try {
        // Execute the query
        $result = $pdo->query($sql);

        // Fetch the row
        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Debugging: Print the fetched row
        // echo "<pre>";
        // print_r($row); // Check the content of the row
        // echo "</pre>";

        // Check if a row was fetched
        if ($row) {
            $_SESSION['username'] = $row['username']; // Save the username from the database
            header("Location: adminSite.php?user=" . urlencode($row['username']));
            exit; // Ensure no further code runs after the redirect
        } else {
            echo "Invalid credentials.";
        }
    } catch (PDOException $e) {
        // Print errors for debugging
        echo "Error: " . $e->getMessage();
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
