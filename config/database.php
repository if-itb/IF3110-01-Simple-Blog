<?php


/**
 * Stores the MySQL database config.
 *
 * Defined params:
 * - driver: the database driver to be used. Defaults to MySQL
 * - database: the name of the database instance to connect to
 * - host: the host of the database. Defaults to localhost.
 * - port: the port to be used. Defaults to 3306.
 * - username: the username used to connect
 * - password: the password used to connect
 */

return [
    'driver' => 'mysql',
    'database' => 'simple_blog',
    'host' => 'localhost',
    'port' => 3306,
    'username' => 'simple-blog',
    'password' => 'keren'
];