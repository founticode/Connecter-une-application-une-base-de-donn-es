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
    <title>Articles List</title>
    <link rel="stylesheet" href="style.css">
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

                <div class="actions">
                    <form action="edit.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                        <button type="submit">Edit</button>
                    </form>

                    <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="empty-message">No articles found.</p>
    <?php endif; ?>
</div>
</body>
</html>