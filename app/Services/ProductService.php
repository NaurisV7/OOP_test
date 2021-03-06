<?php namespace App\Services;

use App\Services\ProcessDataRepository;
use App\Repositories\DataRepository;

class ProductService {

    private ProcessDataRepository $repository;
    private DataRepository $dataRepository;

    function __construct ()
    {
        $this->repository = new ProcessDataRepository;
        $this->dataRepository = new DataRepository;
    }

    public function getList ()
    
    {
        $output = '';
        foreach($this->repository->createList() as $keys) {
            $output .= '<li><div><input class="delete-checkbox" type="checkbox" name="id[]" value="'.$keys[0].'"><span>'.$keys[1].'</span><span>'.$keys[2].'</span><span>'.$keys[3].'</span><span>'.$keys[4].'</span</div></li>';

        }

        return $output;
    }

    public function delete ()
    {
        if(!empty($_POST['id'])){
            $this->dataRepository->delete();
        }
        
    }

    public function addList ()
    {
        if(!empty($_POST['sku'])) {
            array_shift($_POST);
            

            $this->dataRepository->addData($_POST);

        }
    }
    
}
