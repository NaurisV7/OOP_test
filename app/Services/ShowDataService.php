<?php namespace App\Services;

use App\Views\ProductList\ProductService;

class ShowDataService {
    private ProductService $getProductList;

    function __construct ()
    {
        $this->getProductList = new ProductService;
    }


    public function getData()
    {
        return $this->getProductList->getList();
    }
}