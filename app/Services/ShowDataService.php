<?php namespace App\Services;

//use App\Repositories;

echo "Services fails aiziet uz lapu";


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