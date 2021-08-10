<?php namespace App\Views\ProductList;

use App\Services\ProcessDataRepository;

class GetProductList {



    private ProcessDataRepository $repository;

    function __construct ()
    {
        $this->repository = new ProcessDataRepository;
    }

    public function getList ()
    {
        //$output = '<ul class="tabs">';
        // foreach($this->repository->createList() as $keys) {
            // $output .= '<li>'.$keys[1].'</li><li>'.$keys[2].'</li><li>'.$keys[3].' $</li>';
            // switch($this->repository->createList()[4]) {
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
            print_r($this->repository->createList());
        //}
        // echo count($this->repository->createList());
        // $output .= '</ul>';
        // return $output;

    }
}
