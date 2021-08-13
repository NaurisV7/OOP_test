<?php

include '../autoload.php';
?>
<link rel="stylesheet" href="style.css" />
<?php


// $service = new App\Controllers\Index;

// echo $service->productList();

$test = new App\Controllers\ProductsController;

$test->productList();