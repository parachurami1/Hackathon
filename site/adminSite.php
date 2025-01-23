<?php
require('conn.php');  // Ensure this contains the PDO connection setup for SQLite

$user = $_GET['user'];  // User input directly used in query

// Connect to the SQLite database using PDO (make sure this connection is in conn.php)
try {
    // Prepare the query to fetch the admin user by username
    $sql = "SELECT * FROM admin WHERE username = '$user'";  // Direct SQL query (vulnerable to SQL injection)
    $result = $pdo->query($sql);  // Execute the query using PDO's query method
    $row = $result->fetch(PDO::FETCH_ASSOC);  // Fetch the result as an associative array

    // Check if email is not equal to "admin@net.com"
    if ($row['email'] !== "admin@net.com") {
        header("Location: admin.php");
        exit;  // Stop further execution after redirect
    }

    // Prepare the second query to fetch the admin user by username again
    $sql2 = "SELECT * FROM admin WHERE username = '$user'";  // Same vulnerable query
    $result2 = $pdo->query($sql2);  // Execute the query
    $row2 = $result2->fetch(PDO::FETCH_ASSOC);  // Fetch the second result

    // print_r($row2); // For debugging: to see the fetched row

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .profile-card {
            display: flex;
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .profile-card .left {
            background: linear-gradient(135deg, #f857a6, #ff5858);
            color: #fff;
            text-align: center;
            padding: 2rem;
            flex: 1;
        }

        .profile-card .left img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .profile-card .left h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .profile-card .left p {
            margin: 0.5rem 0;
            font-size: 1rem;
        }

        .profile-card .right {
            padding: 2rem;
            flex: 2;
        }

        .profile-card .right h3 {
            margin-bottom: 1rem;
            font-size: 1.2rem;
            border-bottom: 1px solid #ddd;
            padding-bottom: 0.5rem;
        }

        .profile-card .right .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .profile-card .right .info div {
            flex: 1;
        }

        .profile-card .right .projects {
            display: flex;
            justify-content: space-between;
        }

        .profile-card .right .projects div {
            flex: 1;
        }

        .profile-card .right .social {
            margin-top: 1rem;
            text-align: center;
        }

        .profile-card .right .social a {
            margin: 0 0.5rem;
            color: #555;
            text-decoration: none;
            font-size: 1.5rem;
        }

        .profile-card .right .social a:hover {
            color: #f857a6;
        }
    </style>
</head>
<body>
    <header>
    </header>
    <div class="profile-card">
        <div class="left">
            <img src="./pic.jpg" alt="Profile Picture">
            <h2><?php print($row2['username'])?> </h2>
            <p>Web Designer</p>
        </div>
        <div class="right">
            <h3>Information</h3>
            <div class="info">
                <div>
                    <p><strong>Email</strong></p>
                    <p><?php print($row2['email'])?> </p>
                </div>
                <div>
                    <p><strong>Phone</strong></p>
                    <p>98979989898</p>
                </div>
            </div>
            <h3>Projects</h3>
            <div class="projects">
                <div>
                    <p><strong>Recent</strong></p>
                    <p>Sam Disuja</p>
                </div>
                <div>
                    <p><strong>Most Viewed</strong></p>
                    <p>Dinoter husainm</p>
                </div>
            </div>
            <div class="social">
                <a href="#" aria-label="Facebook">&#xf09a;</a>
                <a href="#" aria-label="Twitter">&#xf099;</a>
                <a href="#" aria-label="Instagram">&#xf16d;</a>
                <p>flag:H1dd3n_D1r3ct0ry-fl4g</p>
            </div>
        </div>
    </div>
    <ul>
        <li><a href="logout.php">logout</a></li>
        <!-- <li><a href="comment_section.php">Comments</a></li> -->
        <li><a href="image_upload.php" class="uploadBtn">Upload image</a></li>
    </ul>
</body>
</html>
