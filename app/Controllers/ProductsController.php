<?php namespace App\Controllers;

use App\Services\ProductService;

class ProductsController {
    private ProductService $productService;
    
    public function productList() 
    {        
        $this->productService = new ProductService;
        
        return $this->view('ProductList', [
            'gg' => $this->productService->getList()
        ]);
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

    public function deleteData () {

        $this->productService = new ProductService;

        if(!empty($_POST)){
            $this->productService->deleteProductService();
        }        
    }

}