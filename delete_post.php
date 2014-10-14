<?php
	require ("sqlconnect.php");
	$postdelete = "DELETE FROM listpost WHERE ID =".$_GET['IDPOST'];
	if (!mysqli_query($con,$postdelete)) {
		die ('Error: '. mysqli_error($con));
	}
	echo "deleted";
	mysqli_close($con);
	header("Location: index.php"); 
	die();
?>