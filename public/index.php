<?php

// define the ROOT_PATH
define('ROOT_PATH', dirname(__DIR__));

// PHASE 1: bootstrapping
// register the autoloader
spl_autoload_register(function ($class) {
    include ROOT_PATH."/{$class}.php";
});

if (!session_start()) {
    throw new RuntimeException("Cannot start session!");
};

// load our .env file, if exists
if (file_exists(ROOT_PATH.'/.env')) {
    \App\Core\ConfigLoader::loadEnv();
}

// get the router
$router = \App\Core\Router::getInstance();

/**
 * Register the routes here
 */
$router->get('/', function () {
    echo 'Hello, world!';
});

$router->get('/auth/login', 'UserController@getLogin');

$router->get('/users/[int:id]', 'UserController@index');

// ...and off we go!
$router->dispatch();
