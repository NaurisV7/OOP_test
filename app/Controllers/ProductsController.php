<?php namespace App\Controllers;

use App\Services\GetProductList;

class ProductsController {
    
    public function productList() 
    {        
        $output = new GetProductList;
        $this->output = new GetProductList;
        
        return $this->view('ProductList', [
            'gg' => $output->getList(),
            'variablis2' => 'abc'
        ]);
    }

    function view(string $name, $variables2) 
    {
        $template = __DIR__.'/../Views/'.$name.'.php';
        if(!file_exists($template)) {
            echo $template;
        }


        // ob_start();
        if(is_array($variables2)) {
            extract($variables2, EXTR_PREFIX_SAME, 'wddx');
        }

        include $template;

        // $renderedView = ob_get_clean();
        // return $renderedView;
    }
}