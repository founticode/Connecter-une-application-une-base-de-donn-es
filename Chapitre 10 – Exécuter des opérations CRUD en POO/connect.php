<?php

class database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "local_db";
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




