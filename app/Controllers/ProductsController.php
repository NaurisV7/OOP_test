<?php namespace App\Controllers;

use App\Services\ProductService;
use App\Validations\ProductValidation;

class ProductsController {
    private ProductService $productService;
    private ProductValidation $productValidation;
    private string $errors = "";

    function __construct ()
    {
        $this->productService = new ProductService;
        $this->productValidation = new ProductValidation;
    }

    public function productList() 
    {        

        $this->delete();
        if(!empty($_POST['add']) || !empty($_POST['save'])) {
            $this->productAdd();
        } else {
            return $this->view('ProductList', [
                'gg' => $this->productService->getList()
            ]); 
        }
        
    }

    function view(string $name, $variables) 
    {
        $template = __DIR__.'/../Views/'.$name.'.php';
        if(!file_exists($template)) {
            echo $template;
        }

        // ob_start();
        if(is_array($variables)) {
            extract($variables, EXTR_PREFIX_SAME, 'wddx');
        }

        include $template;

        // $renderedView = ob_get_clean();
        // return $renderedView;
    }

    public function delete () 
    {

        if(!empty($_POST)){;
            $this->productService->delete();
        }        
    }

    public function productAdd ()
    {
        if(!empty($_POST['save'])) {


            print_r($_POST);
            $this->errors = $this->productValidation->validate();
            echo $this->errors;

            
        } 
        // else if () {

        // }
        
        return $this->view('ProductAdd', [
            'gg' => [1,2]
        ]);

        

    }

    

}