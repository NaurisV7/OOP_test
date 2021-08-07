<?php namespace App\Repositories;

class DataRepository extends Database {

    public function getData (): array
    {
        $result = $this->conn->query('SELECT * FROM furniture');

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = array($row);
            
        }

        return $data;
    }
}