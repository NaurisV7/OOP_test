<?php namespace App\Services;


class ShowDataRepository {
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