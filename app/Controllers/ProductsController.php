<?php namespace App\Controllers;

class ProductsController {

    public function productList() 
    {
        return $this->view('ProductList', [
            'gg' => [1,2],
            'variables2' => 'abc'
        ]);
    }

    function view(string $name, $variables) 
    {
        $template = __DIR__.'/../Views/'.$name.'.php';
        if(!file_exists($template)) {
            echo $template;
        }
        echo $template;

        // ob_start();
        if(is_array($variables)) {
            extract($variables, EXTR_PREFIX_SAME, 'wddx');
        }

        include $template;

        // $renderedView = ob_get_clean();
        // return $renderedView;
    }
}