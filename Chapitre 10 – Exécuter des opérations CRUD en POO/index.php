<?php

require 'connect.php';
require 'user.php';

$database = new database();
$db = $database->connect();

$user = new user($db);
$user->name = "Alice";
$user->email = "alice@gmail.com";
//$user->create();

$liste = $user->read();
foreach($liste as $u) {
    echo $u['name'] . " - " . $u['email'] . "<br>";
}

$user->id = 1;
if ($user->delete()) {
    echo "Delete successfully. ";
} else {
    echo "Delete failed! ";
}

$user->id = 6;
$user->name = 'Boukaya';
$user->email = 'boukayaa@gmail.com';
if ($user->update()) {
    echo "Update successfully";
}else {
    echo "Update failed.";
}