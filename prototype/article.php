<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "blog_db";
    private $port = 3307;

    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
            "mysql:host=$this->host;port=$this->port;dbname=$this->dbname",
            $this->user,
            $this->password);
            // echo "Connect successfullfy. ";

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error : " . $e->getMessage();
        }
        return $this->conn;
    }
}


class Article {
    
    private $conn;
    private $table = "articles";

    public $id;
    public $title;
    public $content;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $sql = "INSERT INTO $this->table (title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            'title' => $this->title,
            'content' => $this->content
        ]);
    }

    public function read() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}