<?php

include 'autoload.php';


$service = new \App\Services\ShowDataRepository;

var_dump($service->getData());