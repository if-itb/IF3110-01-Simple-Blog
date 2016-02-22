<?php

use App\Core\ConfigLoader as Config;

/**
 * Stores the database config.
 *
 * Defined params:
 * - driver: the PDO database driver to be used. Defaults to mysql
 * - database: the name of the database instance to connect to
 * - host: the host of the database. Defaults to localhost.
 * - port: the port to be used. Defaults to 3306.
 * - username: the username used to connect
 * - password: the password used to connect
 */
return [
    'driver' => Config::env('DB_DRIVER', 'mysql'),
    'database' => Config::env('DB_DATABASE', 'simple_blog'),
    'host' => Config::env('DB_HOST', 'localhost'),
    'port' => Config::env('DB_PORT', 3306),
    'username' => Config::env('DB_USERNAME', 'simple-blog'),
    'password' => Config::env('DB_PASSWORD', '')
];