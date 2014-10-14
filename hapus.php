
<?php
	 include "koneksi.php"; 
	$id = $_GET['id'];
	
	
	$delete = "DELETE FROM `tblblog` WHERE `id`='$id' ";
	$delete_query = mysql_query($delete);
	if($delete_query){
		header('location:index.php');
	} 
?>



