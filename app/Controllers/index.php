<?php namespace App\Controllers;

use App\Views\ProductList\GetProductList;

class Index {
    private GetProductList $getProductList;

    public function productList () {
        
        $this->GetProductList = new GetProductList;

        return $this->GetProductList->getList();
    }

}
