<?php

include 'autoload.php';


$service = new \App\Services\ShowDataService;

print_r($service->getData());