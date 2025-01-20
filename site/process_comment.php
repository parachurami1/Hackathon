<!-- process_comment.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    file_put_contents("comments.txt", $comment . "<br>", FILE_APPEND); // Direct insertion
    header("Location: comment_section.php");
    exit;
}
?>