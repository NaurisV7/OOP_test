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
        $output = '<ul class="tabs">';
        foreach($this->repository->createList() as $keys) {
            $output .= '<li><div><span>'.$keys[0].'</span><span>'.$keys[1].'</span><span>'.$keys[2].'</span><span>'.$keys[3].'</span</div></li>';

        }
        $output .= '</ul>';
        return $output;
    }
}
