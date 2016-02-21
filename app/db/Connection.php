<?php namespace App\Db;

use RuntimeException;
use PDOException;
use PDO;

/**
 * Class Connection
 *
 * Thin wrapper for the database connection
 * @package App\Db
 */
class Connection
{

    /**
     * @var string
     */

    // Connection handle
    private $conn;

    static $table_post = "post";
    static $table_comment = "komentar";

    // the class instance
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    /**
     * Constructor for Database singleton. Set to protected, so that it cannot be accessed from outside.
     */
    protected function __construct() {
        $this->conn = null;
        self::connect();
    }

    /**
     * Connect to database
     *
     * Assumes ROOT_PATH is loaded.
     */
    protected function connect() {
        $configPath = ROOT_PATH.'/db/database.php';
        $dbConfig = null;

        if (file_exists($configPath)) {
            $dbConfig = require_once $configPath;

            // checks each parameter
            // assign default if necessary
            if (! isset( $dbConfig['database'] )) {
                throw new RuntimeException("Database parameter is not defined! Please check {$configPath}");
            }

            if (! isset( $dbConfig['host'] )) {
                $dbConfig['host'] = 'localhost';
            }

            if (! isset( $dbConfig['port'] )) {
                $dbConfig['port'] = 3306;
            }

            if (! isset( $dbConfig['username'] )) {
                $dbConfig['username'] = '';
            }

            if (! isset( $dbConfig['password'] )) {
                $dbConfig['password'] = '';
            }
        } else {
            throw new RuntimeException("Database config file is missing! Please check {$configPath}.");
        }

        // since we're only using mysql...
        try {
            $this->conn = new PDO("mysql:dbname={$dbConfig['database']}".
                ";host={$dbConfig['host']}".
                ";port={$dbConfig['port']}",
                $dbConfig['username'],
                $dbConfig['password']);
        } catch (PDOException $e) {
            throw new RuntimeException("Error connecting to database: {$e->getMessage()}", 1, $e);
        }
    }

    /**
     * Get the connection handle
     * @return PDO
     */
    public function getHandle() {
        if(!isset($this->conn)) {
            self::connect();
        }

        return $this->conn;
    }
}