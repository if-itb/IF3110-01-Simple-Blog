<?php
	$con = mysqli_connect("localhost", "root", "", "dbblog");
	if(mysqli_connect_errno()){
		echo "Gagal menghubungkan ke basis data blog";
	}
	
	$id = $_GET['ID'];
	
	mysqli_query($con, "DELETE FROM post WHERE ID='$id'");
	mysqli_close($con);
	
	header('Location: '.'index.php');
?>
