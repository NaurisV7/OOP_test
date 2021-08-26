<?php namespace App\Repositories;

class DataRepository extends Database {

    public function getData (): array
    {
        $result = $this->conn->query('SELECT * FROM furniture');

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            
        }

        return $data;
    }

    public function delete() {
        foreach($_POST['id'] as $id) {
            $this->conn->query("DELETE from furniture WHERE id = '$id'");
        }

    }
}