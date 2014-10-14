<?php

class connect_db {

	public function __construct() {
		$this->connect();
	}

	public function __destruct() {
		$this->close();
	}

	public function connect() {

		$con = mysql_connect("localhost", "root", "") or die(mysql_error());
		$db = mysql_select_db("blog_post") or die(mysql_error());

		return $con;
	}

	public function close() {
		mysql_close();
	}

}

?>
