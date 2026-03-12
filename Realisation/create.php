<?php
require "article.php";

$database = new Database();
$db = $database->connect();
$article = new Article($db);

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (empty($title) || empty($content)) {
        $message = "Please fill in all fields.";
    } else {
        $article->title = $title;
        $article->content = $content;

        if ($article->create()) {
            header("Location: index.php");
            exit;
        } else {
            $message = "Failed to add article.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New Article</h2>

    <?php if (!empty($message)) : ?>
        <p class="message error"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <div>
            <label>Title:</label>
            <input type="text" name="title">
        </div>

        <div>
            <label>Content:</label>
            <textarea name="content"></textarea>
        </div>

        <button type="submit">Add Article</button>
    </form>

    <br>
    <a href="index.php">Back to Articles</a>
</div>
</body>
</html>