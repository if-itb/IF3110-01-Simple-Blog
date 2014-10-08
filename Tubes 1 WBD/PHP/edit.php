<?php
	/* Fetching Post data to be shown in editPost.php */
	require_once('startConnection.php');
	
	//check connection
	if (mysqli_connect_errno()) {
		//connection to database failed
		$url = "../VIEW/dbFail.html";
		header( "Location: $url" ); 
	}
	else {
		//echo "success connect to database";
		$result = mysqli_query($con, "SELECT * FROM post where id=".$_GET["id"]);
		
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
			echo "<span class='formLabel'> Title &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </span> <input id='postTitle' name='postTitle' placeholder='Title' type='text' value=".$row["title"]."></input>";
			echo "<br>";
			echo "<span class='formLabel'> Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </span> <input id='postDate' name='postDate' placeholder='YYYY-MM-DD' type='text' value=".$row["datePost"]."></input>";
			echo "<br>";
			echo "<div class='formLabel'> Content &nbsp&nbsp&nbsp&nbsp: </div> <textarea id='postContent' name='postContent'>".$row["content"]."</textarea>";
			echo "<br>";
			echo "<input id='hidden' name='hidden' value=".$row["id"]."> </input>";
		}
		mysqli_close($con);
	}
?>
