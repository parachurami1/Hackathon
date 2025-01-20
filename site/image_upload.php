<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>User Profile</h1>
    </header>
    <main>
        <form action="upload_image.php" method="POST" enctype="multipart/form-data">
            <label for="profile_image">Upload Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image" required>
            <button type="submit">Upload</button>
        </form>
    </main>
</body>
</html>

<!-- upload_image.php -->

