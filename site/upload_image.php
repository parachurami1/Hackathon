<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['profile_image'];
    $upload_dir = 'uploads/';

    if (move_uploaded_file($file['tmp_name'], $upload_dir . $file['name'])) { // No validation
        echo "File uploaded successfully: uploads/" . $file['name'];
    } else {
        echo "Failed to upload file.";
    }
}
?>