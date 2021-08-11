<?php

include '../autoload.php';


$service = new App\Controllers\Index;

echo $service->productList();