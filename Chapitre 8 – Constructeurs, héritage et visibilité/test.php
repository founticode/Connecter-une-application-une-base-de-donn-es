<?php

require "extends.php";

$article = new blogeArticle("POO en PHP", "Découvrir l'héritage.", " Alice");
echo $article->display();