<?php

include 'autoload.php';


$service = new \App\Services\ShowDataService;

echo $service->getData();