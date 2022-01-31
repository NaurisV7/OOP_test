<?php namespace App\Validations;

use App\Services\ProductService;

class ProductValidation {
    private ProductService $productService;
    private string $errors = "";

    function __construct ()
    {
        $this->productService = new ProductService;
    }

    function validate ()
    {
        $this->validateForm();
        return $this->errors;
    }


    function validateForm ()
    {
        if (empty($_POST['sku'])){
            $this->addError("Please, submit required data1");
            
        } elseif (empty($_POST['price'])){
            $this->addError("Please, submit required data2");
        } elseif (empty($_POST['name'])){
            $this->addError("Please, submit required data3");
        } elseif (!empty($_POST['sku']) && !empty($_POST['price']) && !empty($_POST['name'])) {
            if (!preg_match("/([A-Za-z0-9]+)/", $_POST['sku'])) {
                $this->addError("Please, provide the data of indicated type");
            } elseif (!preg_match("/([0-9]+)/", $_POST['price'])) {
                $this->addError("Please, provide the data of indicated type");
            } elseif (!preg_match("/([A-Za-z]+)/", $_POST['name'])) {
                $this->addError("Please, provide the data of indicated type");

            } elseif ($_POST['productType'] === 'dvd') {
                if (empty($_POST['size'])) {
                    $this->addError("Please, provide size");
                } elseif (!preg_match("/([0-9]+)/", $_POST['size'])) {
                    // jaievada ir cipari
                    $this->addError("Please, provide the data of indicated type");
                }

            } elseif ($_POST['productType'] === 'furniture') {
                if (empty($_POST['height'])){
                    $this->addError("Please, provide height");
                } elseif (empty($_POST['width'])) {
                    $this->addError("Please, provide width");
                } elseif (empty($_POST['length'])) {
                    $this->addError("Please, provide length");
                } elseif (!preg_match("/([0-9]+)/", $_POST['height'])) {
                    // jaievada ir cipari
                    $this->addError("Please, provide the data of indicated type");
                } elseif (!preg_match("/([0-9]+)/", $_POST['width'])) {
                    // jaievada ir cipari
                    $this->addError("Please, provide the data of indicated type");
                } elseif (!preg_match("/([0-9]+)/", $_POST['length'])) {
                    // jaievada ir cipari
                    $this->addError("Please, provide the data of indicated type");
                } 

            } elseif ($_POST['productType'] === 'book') {
                if (empty($_POST['weight'])) {
                    $this->addError("Please, provide weight");
                } elseif (!preg_match("/([0-9]+)/", $_POST['weight'])) {
                    // jaievada ir cipari
                    $this->addError("Please, provide the data of indicated type");
                }                

            }
        } else {
            echo "nenenen";
        }
       
    }

    function addError ($error)
    {
        $this->errors = $error;
    }
}