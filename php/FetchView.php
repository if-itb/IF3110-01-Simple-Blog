<?php
	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	
	//check connection
	if (!mysqli_connect_errno()) {
		$result = mysqli_query($con, "SELECT * FROM post where id=".$_GET["id"]);

		echo "<div>";
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
			echo $row["title"];
			echo "<br>";
			echo $row["date"];
			echo "<br>";
			echo $row["content"];
			echo "<br>";
		}
		echo "</div>";
		mysqli_close($con);
	}
?>