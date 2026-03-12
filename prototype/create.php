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
            $message = "Article added successfully.";
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
    <link rel="stylesheet" href="style.css">
    <title>Create Article</title>
</head>
<body>

   <div class="container">
    <h2>Add New Article</h2>

    <?php if (!empty($message)) : ?>
        <p class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </p>
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
    <a href="index.php">See all articles</a>
</div>

</body>
</html>
