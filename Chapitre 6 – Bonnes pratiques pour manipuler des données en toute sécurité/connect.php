<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "local_db";

try {
  $pdo = new PDO("mysql:host=$servername;port=3307;dbname=$dbname", $username, $password);

  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>