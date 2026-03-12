<?php
require "article.php";

$database = new Database();
$db = $database->connect();
$article = new Article($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $article->id = trim($_POST['id']);

    if ($article->delete()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Failed to delete article.";
    }
} else {
    echo "Invalid request.";
}