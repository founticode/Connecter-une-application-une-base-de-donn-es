<?php

try {

    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=local_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();

    echo "Query executed successfully";

} catch (PDOException $e) {

    echo "Error : " . $e->getMessage();
}

?>