<?php

require 'connect.php';
require 'user.php';

$database = new database();
$db = $database->connect();

$user = new user($db);
$user->name = "Soukaina";
$user->email = "soukaina@gmail.com";
$user->create();

$liste = $user->read();
foreach($liste as $u) {
    echo $u['name'] . " - " . $u['email'] . "<br>";
}

$user->id = 33;
if ($user->delete()) {
    echo "Delete successfully. ";
} else {
    echo "Delete failed! ";
}

$user->id = 31;
$user->name = 'Founti';
$user->email = 'fountii@gmail.com';
if ($user->update()) {
    echo "Update successfully";
}else {
    echo "Update failed.";
}