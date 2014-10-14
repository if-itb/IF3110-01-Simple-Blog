<?php
	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");

	$id=$_GET["id"];

	//check connection
	if (!mysqli_connect_errno()) {
		$result = mysqli_query($con, "SELECT * FROM post where id=".$id);
		
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
			echo "<span> Title: </span> <input id='Title' name='Title' placeholder='Title' type='text' value=".$row["Title"]."></input>";
			echo "<br>";
			echo "<span> Date: </span> <input id='Date' name='Date' placeholder='YYYY-MM-DD' type='text' value=".$row["Date"]."></input>";
			echo "<br>";
			echo "<div class='formLabel'> Content: </div> <textarea id='Content' name='Content'>".$row["Content"]."</textarea>";
			echo "<br>";
			echo "<input id='hidden' name='hidden' value=".$row["id"]."> </input>";
		}
		mysqli_close($con);
	}
?>