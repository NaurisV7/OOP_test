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

    public function addData($data)
    {

        $dbData = ['sku', 'name', 'price', 'switcher', 'size', 'height', 'width', 'length', 'weight'];
        $result = $this->conn->query("INSERT INTO furniture (".implode(', ', $dbData).")  VALUES (".(implode(', ', $data)).");");

        //echo "INSERT INTO furniture (".implode(', ', $dbData).")  VALUES (".(implode(', ', $data)).");";
        return $result;
        
    }
}