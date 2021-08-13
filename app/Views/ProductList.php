<?php namespace App\Views;

use App\Services\GetProductList as GetProductList;


$output = new GetProductList;
echo $output->getList();


