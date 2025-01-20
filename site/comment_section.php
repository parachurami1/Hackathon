<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Comment Section</h1>
    </header>
    <main>
        <form action="process_comment.php" method="POST">
            <label for="comment">Your Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
            <button type="submit">Submit</button>
        </form>
        <section id="comments">
            <h2>All Comments:</h2>
            <?php
                $comments = file_get_contents("comments.txt"); // No sanitization, vulnerable to XSS
                echo $comments;
            ?>
        </section>
    </main>
</body>
</html>