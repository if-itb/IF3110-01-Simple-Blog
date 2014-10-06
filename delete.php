 <?php
	include('connectdb.php');
	$id_post = $_GET['id_post'];
	$query = mysql_query("DELETE FROM post WHERE id_post = '$id_post'") or die (mysql_error());
	if($query){
		header('location:index.php');
	}
	mysql_close();
 ?>