<?php

class Article {
    public $title;
    public $content;

    public function display(){
        return "title : " . $this->title . " - content : " . $this->content;  
    }
}

$article1 = new Article();
$article1->title = "Object-orient programming. ";
$article1->content = "La POO facilite la modularité et la maintenance.";

echo $article1->display();
echo "<br>";

$article2 = new Article();
$article2->title = "Introduction à PHP. ";
$article2->content = "PHP est un langage de script côté serveur.";

echo $article2->display();





?>