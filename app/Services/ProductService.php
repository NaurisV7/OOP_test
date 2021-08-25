<?php namespace App\Services;

use App\Services\ProcessDataRepository;

class ProductService {



    private ProcessDataRepository $repository;

    function __construct ()
    {
        $this->repository = new ProcessDataRepository;
    }

    public function getList ()
    {
        $output = '
        <form action="" method="POST">
        <button type="submit">Submit</button>
        <ul class="tabs">
        ';
        foreach($this->repository->createList() as $keys) {
            $output .= '<li><div><input type="checkbox" name="id[]" value="'.$keys[0].'"><span>'.$keys[1].'</span><span>'.$keys[2].'</span><span>'.$keys[3].'</span><span>'.$keys[4].'</span</div></li>';

        }
        $output .= '</ul></form>';
        return $output;
    }
    
}
