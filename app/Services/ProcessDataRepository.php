<?php namespace App\Services;

use App\Repositories\DataRepository;

class ProcessDataRepository {
    private DataRepository $repository;
    private $count;


    function __construct ()
    {
        $this->repository = new DataRepository;
        $this->count = count($this->repository->getData());
    }

    public function createList ()
    {
        $data = [];
        foreach($this->repository->getData() as $keys) {
            switch($keys['switcher']) {
                case 'dvd':
                    $data[] = [$keys['sku'], $keys['name'], $keys['price'].' $', 'Size: '.$keys['size'].' MB'];
                    break;
                case 'furniture':
                    $fullSize = $keys['height'] . 'x' . $keys['width'] . 'x' . $keys['length'];
                    $data[] = [$keys['sku'], $keys['name'], $keys['price'].' $', 'Dimension: '.$fullSize];
                    break;
                case 'book':
                    $data[] = [$keys['sku'], $keys['name'], $keys['price'].' $', 'Weight: '.$keys['weight'].'KG'];
                    break;            
            }
        }
        return $data;
    }
}
