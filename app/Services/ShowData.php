<?php

use Repository\Database;

class ShowData extends Database
{
    private $conn;
    private $sql;

    public function __construct () {
        $this->conn = new Database();
        echo "tst";
    }

    public function getData () {
        $this->sql = 'SELECT * FROM furniture';

        $result = $this->conn->query($sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                    echo $row['sku'];
            }
        } else {
            echo "shit is about to go down! :D";
        }
    }




}