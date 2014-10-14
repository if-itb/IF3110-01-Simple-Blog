<?php
	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	
	//check connection
	if (!mysqli_connect_errno()) {
		//echo "success connect to database";
		$result = mysqli_query($con, "SELECT * FROM post where id=".$_GET["id"]);
		
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
			echo "<span> Title : </span> <input id='Title' name='Title' placeholder='Title' type='text' value=".$row["title"]."></input>";
			echo "<br>";
			echo "<span> Date : </span> <input id='Date' name='Date' placeholder='YYYY-MM-DD' type='text' value=".$row["date"]."></input>";
			echo "<br>";
			echo "<div> Content : </div> <textarea id='Content' name='Content'>".$row["content"]."</textarea>";
			echo "<br>";
			
			echo "<input id='Hidden' name='Hidden' value=".$row["id"]."> </input>";
		}
		mysqli_close($con);
	}
?>