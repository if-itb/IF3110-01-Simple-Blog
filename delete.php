<?php
	$con=mysqli_connect("localhost","root","","simpleblog");
    if (mysqli_connect_errno()){
    	echo "Fail to connect to database".mysqli_connect_error();
    }
	if (isset($_GET['id'])){
		$hapus=$_GET['id'];
		$strSql= "delete from blogtable where no_post=$hapus";
		mysqli_query($con,$strSql);		
	    if (!mysqli_query($con,$strSql)){
			header("Location:post.php");
		}
		else{
			header("Location:index.php");
		}
	}
	mysqli_close($con);
?>