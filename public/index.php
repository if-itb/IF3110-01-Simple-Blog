<?php

// define the ROOT_PATH
define('ROOT_PATH', dirname(__DIR__));

// register the autoloader
spl_autoload_register(function ($class) {
    include ROOT_PATH."/{$class}.php";
});

use App\Core\View;

$view = new View('layout.tpl');

echo $view->output();