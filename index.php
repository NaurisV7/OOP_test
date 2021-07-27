<?php

include 'autoload.php';


$service = new \App\Services\ShowDataService;

print_r(array_values($service->getData()));