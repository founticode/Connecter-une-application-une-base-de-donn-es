<?php

require "connect.php";

try {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email! ");
    }

    $sql = "INSERT INTO users (name, email) VALUE (:name, :email)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,     
        'email' => $email
    ]);

    echo "User " . htmlspecialchars($name) . " inserted successfully";

} catch (PDOException $e) {
    file_put_contents(

        __DIR__ . '/error.log',
        date('q-m-y H:i:s') . ' - ' . $e->getMessage() . PHP_EOL,   
        FILE_APPEND
    );

    echo "Something went wrong.";

}






?>