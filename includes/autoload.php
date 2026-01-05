<?php

spl_autoload_register(function ($class) {

    $baseDir = __DIR__ . '/../classes/';
     $baseDir = __DIR__ . '/../public/';

    $paths = [
        '',
        'models/',
        'repositories/',
        'utils/',
        
    ];

    foreach ($paths as $path) {
        $file = $baseDir . $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
