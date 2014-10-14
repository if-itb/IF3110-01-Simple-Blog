<?php

 $id=$_POST["id"];
 $title=$_POST["Title"];
 $date=$_POST["Date"];
 $content=$_POST["Content"];

	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	
	//check connection
	if (!mysqli_connect_errno()) {
		//echo "success connect to database";
		$result = mysqli_query($con, "UPDATE post SET title='".$title."',date='".$date."',content='".$content."'WHERE id='".$id."'");
		$url = 'index.php';
		mysqli_close($con);
		header( "Location: $url" ); 		
	}
?>