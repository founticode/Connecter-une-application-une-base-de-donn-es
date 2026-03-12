<?php
require "article.php";

$database = new Database();
$db = $database->connect();
$article = new Article($db);

$message = "";
$currentArticle = null;

/* المرحلة 1: جينا من index */
if (isset($_POST['id']) && !isset($_POST['title'])) {

    $article->id = $_POST['id'];
    $currentArticle = $article->readOne();
}

/* المرحلة 2: update */
if (isset($_POST['title'], $_POST['content'], $_POST['id'])) {

    $article->id = $_POST['id'];
    $article->title = trim($_POST['title']);
    $article->content = trim($_POST['content']);

    if ($article->update()) {
        header("Location: index.php");
        exit;
    } else {
        $message = "Update failed.";
    }

    $currentArticle = [
        'id' => $article->id,
        'title' => $article->title,
        'content' => $article->content
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New Article</h2>

    <?php if (!empty($message)) : ?>
        <p class="message error"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="edit.php" method="POST">

        <input type="hidden" name="id"
        value="<?php echo htmlspecialchars($currentArticle['id']); ?>">

        <div>
            <label>Title</label>
            <input type="text" name="title"
            value="<?php echo htmlspecialchars($currentArticle['title']); ?>">
        </div>

        <div>
            <label>Content</label>
            <textarea name="content"><?php echo htmlspecialchars($currentArticle['content']); ?></textarea>
        </div>

        <button type="submit">Save</button>

    </form>

    <br>
    <a href="index.php">Back to Articles</a>
</div>
</body>
</html>