<?php namespace App\Repositories;

class DataRepository extends Database {

    public function getData (): array
    {
        $result = $this->conn->query('SELECT * FROM furniture');

        $data = [];
        while ($row = $result->fetch_assoc()) {
            if ($row['switcher'] === 'dvd'){
               $data[] = array($row['id'], $row['sku'], $row['name'], $row['price'], $row['size']); 
            } elseif ($row['switcher'] === 'furniture') {
                $data[] = array($row['id'], $row['sku'], $row['name'], $row['price'], $row['height'], $row['width'], $row['length']);
            } elseif ($row['switcher'] === 'book') {
                $data[] = array($row['id'], $row['sku'], $row['name'], $row['price'], $row['weight']);
            }
            
        }

        return $data;
    }
}