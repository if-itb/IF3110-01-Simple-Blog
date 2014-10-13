<?php
	require("koneksi_mysql.php");
	
	$id_post = $_GET['id']; 
	
	$query = mysql_query("DELETE FROM tbl_posting WHERE id_post = '$id_post'"); 
	?> 
	<script language="JavaScript">
		alert("Data Berhasil Dihapus");
		document.location='index.php'
	</script> 
	<?php 

?>