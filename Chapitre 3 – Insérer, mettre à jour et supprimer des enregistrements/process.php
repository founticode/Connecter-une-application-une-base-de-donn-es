<?php

require "connect.php";

// INSERT 
try {
    
    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'name' => "Walid",
        'email' => "walid@gmail.com"
    ]);

    echo "User added successefully. ";

}catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}


// UPDATE
try {

    $sql = "UPDATE users SET name = :name WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => "Founti",
        'id' => 6
    ]);
    echo "Name changed successfully. ";

}catch (PDOException $r) {
    echo "Error : " . $r->getMessage();

}


// DELETE 
try {

    $sql = "DELETE FROM users WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => 3
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Operation successful ";       
    }else {
        echo "No rows affected";
    }

}catch (PDOException $r) {
    echo "Error : " . $r->getMessage();

}

?>