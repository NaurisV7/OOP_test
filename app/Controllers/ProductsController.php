<?php namespace App\Controllers;

use App\Services\ProductService;

class ProductsController {
    private ProductService $productService;

    function __construct ()
    {
        $this->productService = new ProductService;
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
            $this->productService->addList();
        }
        
        return $this->view('ProductAdd', [
            'gg' => [1,2]
        ]);

        

    }

    

}