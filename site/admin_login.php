<!-- admin_login.php -->
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_user = $_POST['admin_username'];
    $admin_pass = $_POST['admin_password'];

    if ($admin_user === 'admin' && $admin_pass === 'password') { // Insecure hardcoded credentials
        $_SESSION['admin'] = $admin_user; // Save session
        // echo "Welcome, Admin.";
    } else {
        echo "Invalid admin credentials.";
    }
}
?>