<?php
	include("mysql.php");
	$id_post = $_GET['id'];
	$query_komentar = mysql_query("
			SELECT * 
			FROM comment
			WHERE post_id = '$post_id' 
			ORDER BY id DESC
		") or die("No comments to show.");

	while($row = mysql_fetch_object($query_komentar)){
		$post_id = $row['post_id'];
		$name = $row['name'];
		$email = $row['email'];
		$date = $row['date'];
		$content = $row['content'];
		echo "<li class=\"art-list-item\">";
			echo "<div class=\"art-list-item-title-and-time\">";
				echo "<h2 class=\"art-list-title\"><a href=\"mailto:$email\">$name</a></h2>";
				echo "<div class=\"art-list-time\">$date</div>";
			echo "</div>";
			echo "<p>$content</p>";
		echo "</li>";
	}
?>
