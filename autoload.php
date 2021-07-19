<?php

spl_autoload_register(function ($class_name) {
    include '../app/services/' . $class_name . '.php';
});

