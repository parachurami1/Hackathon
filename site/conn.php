<?php
try {
    // SQLite database file
    $dbFile = '/var/www/html/database.sqlite';

    // Create or connect to the SQLite database
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // echo "Connected to SQLite database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
