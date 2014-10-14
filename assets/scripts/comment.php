<?php
// File that handles all things about comment
// Returns JSON upon invocation, in which the content depends on the method defined
// 
// Currently supported methods:
// - add
// - get

require_once dirname(__FILE__)."/utils.php";
require_once dirname(dirname(__FILE__))."/db/db_connection.php";

$db = Database::getInstance()->getHandle();

static $method, $id, $error;

if(!isset($_GET['method'])) {
	$error = "method not set!";
} else {
	$method = $db->escapeString($_GET['method']);
}

if(!isset($_GET['id'])) {
	$error .= "<br/>post ID not set!";
} else {
	$id = $db->escapeString($_GET['id']);	
}

$table = Database::$table_comment;
if($method == "add") {
	$query = "INSERT INTO $table (nama, email, komentar, id_post) VALUES (:nama, :email, :komentar, :id_post);";

	// get the fields
	$nama = $db->escapeString($_POST['nama']);
	$email = $db->escapeString($_POST['email']);
	$komentar = $db->escapeString($_POST['komentar']);

	// prepare statement
	$stmt = $db->prepare($query);

	$stmt->bindValue(':nama', $nama, SQLITE3_TEXT);
	$stmt->bindValue(':email', $email, SQLITE3_TEXT);
	$stmt->bindValue(':komentar', $komentar, SQLITE3_TEXT);
	$stmt->bindValue(':id_post', $id, SQLITE3_INTEGER);

	$result = $stmt->execute();

	// execute and output the result
	if($result) {
		echo "true";
	} else {
		echo $db->lastErrorMsg();
	}
} else if($method == "get") {
	$query = "SELECT * FROM $table WHERE id_post=:id_post ORDER BY waktu DESC";

	// prepare statement
	$stmt = $db->prepare($query);

	$stmt->bindValue(':id_post', $id, SQLITE3_INTEGER);

	$result = $stmt->execute();
	if($result) {
		// prepare array
		$retArray = array();

		while($row = $result->fetchArray(SQLITE3_ASSOC)) {
			$row['waktu'] = getTimeString($row['waktu']);
			array_push($retArray, $row);
		}

		// blaargh
		echo json_encode($retArray);
	} else {
		echo $db->lastErrorMsg();	
	}
}

?>