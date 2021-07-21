<?php

spl_autoload_register(function ($class) {
    $file = lcfirst(str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');
    if (file_exists($file)) {
        require $file;
        return true;
    }
    echo $file;
    return false;
});

