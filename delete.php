<?php
			$con= mysqli_connect("localhost","root","","list_post");
			if (mysqli_connect_errno()) {
		 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			mysqli_query($con,"DELETE FROM listpost WHERE id='".$_GET["id"]."'");
			mysqli_close($con);
			header('Location:index.php');
		?>