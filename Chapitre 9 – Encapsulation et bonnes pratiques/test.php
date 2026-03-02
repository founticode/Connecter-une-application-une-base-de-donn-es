<?php

require "encapsulation.php";

$article = new Article();
$article->setTitle("POO en PHP");
$article->setContent("Introduction à la programmation orientée objet.");
echo $article->display();


