<?php

// define the ROOT_PATH
define('ROOT_PATH', dirname(__DIR__));

// PHASE 1: bootstrapping
// register the autoloader
spl_autoload_register(function ($class) {
    $path = ROOT_PATH."/{$class}.php";
    if (strpos(php_uname('s'), 'Windows') === false) {
        // running linux; change the slashes
        $path = str_replace('\\', '/', $path);
    }

    include $path;
});

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

    $session = \App\Core\SessionManager::getManager();
    if ($session->isLoggedIn()) {
        echo " Your user id is <strong>{$session->get('user')['id']}</strong>.";
    }
});

$router->get('/auth/login', 'AuthController@getLogin');
$router->post('/auth/login', 'AuthController@postLogin');
$router->get('/auth/logout', 'AuthController@getLogout');

$router->get('/auth/register', 'AuthController@getRegister');
$router->post('/auth/register', 'AuthController@postRegister');

$router->get('/users/[int:id]', 'UserController@index');

$router->get('/post', 'PostController@index');

$router->get('/post/create', 'PostController@getCreate');
$router->post('/post/create', 'PostController@postCreate');
$router->get('/post/edit/[int:id]', 'PostController@getEdit');
$router->post('/post/edit/[int:id]', 'PostController@postEdit');

$router->get('/post/view/[int:id]', 'PostController@getView');

$router->post('/comment/create/[int:id]', 'PostController@postCreateComment');


// ...and off we go!
$router->dispatch();
