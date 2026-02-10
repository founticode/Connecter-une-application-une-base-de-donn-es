<?php

require 'connect.php';

try {

    $sql = "SELECT * FROM users WHERE id > :min_id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(['min_id' => 2]);

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo "ID : " . $user['id'] 
        . " - Name : " . $user['name'] 
        . " - Email : " . $user['email'] . "<br>";
    }

}catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}

echo "<br>";

try {
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['email'] . "<br>" . "</td>";
        echo "</tr>";
    }
}catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}

?>