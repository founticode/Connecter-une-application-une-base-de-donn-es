<?php

require 'connect.php';

try {
    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";

    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "Operation successfully. ";

}catch (PDOException $r) {
    echo "Error : " . $r->getMessage();

}

?>