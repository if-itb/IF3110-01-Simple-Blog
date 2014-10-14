<?php

/**
 * Database class, that handles connection between page and DB.
 */
class Database {
	
	private static $filename;

	// Connection handle
	private $conn;

	static $table_post = "post";
	static $table_comment = "komentar";

	// the class instance
	private static $instance;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$filename = dirname(__FILE__)."/blog.db";
			self::$instance = new Database();
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
	 * @return void
	 */
	protected function connect() {
		$this->conn = new sqlite3(self::$filename);
	}

	/**
	 * Get the connection handle
	 * @return connection handle
	 */
	public function getHandle() {
		if(!isset($this->conn)) {
			self::connect();
		}

		return $this->conn;
	}
};

?>