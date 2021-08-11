<?php namespace App\Services;

use App\Views\ProductList\GetProductList;

class ShowDataService {
    private GetProductList $getProductList;

    function __construct ()
    {
        $this->getProductList = new GetProductList;
    }


    public function getData()
    {
        return $this->getProductList->getList();
    }
}