<?php namespace App\Repositories;

class Database 
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'scandi';
    private $conn;

    public function __construct () {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die ("Connect failed: " . $conn->connect_error);
        } else {
            return $this->conn;
        }

    }

    

    

}