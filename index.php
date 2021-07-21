<?php

include 'autoload.php';


$service = new \App\Services\ShowDataService;

var_dump($service->getData());