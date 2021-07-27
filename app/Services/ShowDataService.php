<?php namespace App\Services;

use App\Repositories\DataRepository;

class ShowDataService {
    private DataRepository $repository;

    function __construct ()
    {
        $this->repository = new DataRepository;
    }

    public function getData(): array
    {
        return [
            $this->repository->getData()
        ];
    }




}