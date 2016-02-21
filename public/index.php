<?php

// define the ROOT_PATH
define('ROOT_PATH', dirname(__DIR__));

// register the autoloader
spl_autoload_register(function ($class) {
    include ROOT_PATH."/{$class}.php";
});

if (!session_start()) {
    throw new RuntimeException("Cannot start session!");
};

// get the router
$router = \App\Core\Router::getInstance();

/**
 * Register the routes here
 */
$router->get('/', function () {
    echo 'hello world!';
});

// ...and off we go!
$router->dispatch();
