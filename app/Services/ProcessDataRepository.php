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
            print_r($keys[0][4]);
            // switch($keys[4]) {
            //     case 'dvd':
            //         $output .= '<li>'.$keys[5].'</li>';
            //         echo "yes this is dvd";                    
            //         break;
            //     case 'furniture':
            //         $output .= '<li>Dimension'.$keys[6].'x'.$keys[7].'x'.$keys[8].'</li>';
            //         echo "yes, this it furniture";
            //         break;
            //     case 'book':
            //         $output .= '<li>'.$keys[9].'</li>';
            //         break;
            
            // }
            //print_r($keys);
        }
        //echo count($this->repository->getData());

        return $data;
        
    

    }
}
