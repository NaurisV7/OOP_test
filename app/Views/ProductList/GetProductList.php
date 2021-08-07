<?php namespace App\Views\ProductList;

use App\Repositories\DataRepository;

class GetProductList {



    private DataRepository $repository;
    private $count;

    function __construct ()
    {
        $this->repository = new DataRepository;
        $this->count = count($this->repository->getData());
    }

    public function getList ()
    {
        $output = '<ul class="tabs">';
        foreach($this->repository->getData() as $keys) {
            $output .= '<li>'.$keys[1].'</li><li>'.$keys[2].'</li><li>'.$keys[3].' $</li>';
            switch($keys[4]) {
                case 'dvd':
                    $output .= '<li>'.$keys[5].'</li>';
                    echo "yes this is dvd";                    
                    break;
                case 'furniture':
                    $output .= '<li>Dimension'.$keys[6].'x'.$keys[7].'x'.$keys[8].'</li>';
                    echo "yes, this it furniture";
                    break;
                case 'book':
                    $output .= '<li>'.$keys[9].'</li>';
                    break;
            }
        }
        
        $output .= '</ul>';
        return $output;

    }
}
