<?php

require 'article.php';

class blogeArticle extends Article {
    
    private $author;

    public function __construct($title, $content, $author) {
        parent::__construct($title, $content);
            $this->author = $author;
        }

        public function display() {
            return parent::display() . " - Author " . $this->author;
        }
    }
