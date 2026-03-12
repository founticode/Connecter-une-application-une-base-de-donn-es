<?php

require "article.php";

$database = new Database();
$db = $database->connect();
$article = new Article($db);

$articles = $article->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Articles List</title>
</head>
<body>

    <div class="container">
    <div class="top-bar">
        <h2>Articles List</h2>
        <a href="create.php">Add New Article</a>
    </div>

    <?php if (!empty($articles)) : ?>
        <?php foreach ($articles as $item) : ?>
            <div class="article">
                <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($item['content'])); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="empty-message">No articles found.</p>
    <?php endif; ?>
</div>

</body>
</html>