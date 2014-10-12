<?php
include 'mysql.php';

	// array isi response
	$result = mysql_query('SELECT * FROM `post_ID` ORDER BY `posted_Date` DESC') or die(mysql_error());
	
	if (mysql_num_rows($result) > 0) {
		$response = array();
		while ($row = mysql_fetch_array($result)){
			$post = array();
			$post['post_ID'] = $row['post_ID'];
			$post['posted_Date'] = $row['posted_Date'];
			$post['posted_body'] = $row['posted_body'];
			$post['is_feat'] = $row['is_feat'];
			$post['posted_title'] = $row['posted_title'];

			array_push($response, $post);
		}
	}

mysql_close();
?>