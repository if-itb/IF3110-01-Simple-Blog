<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		include("db_connect.php");
		$query = "DELETE FROM post WHERE id='".$id."'";

		mysql_query($query);

		header("Location: index.php");
        exit();
	}
?>