<?php

class DB_CONNECT {

	public function __construct() {
		$this->connect();
	}

	public function __destruct() {
		$this->close();
	}

	public function connect() {
		require_once __DIR__ . '/db_config.php';

		$con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
		$db = mysql_select_db(DB_DATABASE) or die(mysql_error());

		return $con;
	}

	public function close() {
		mysql_close();
	}

}

?>
