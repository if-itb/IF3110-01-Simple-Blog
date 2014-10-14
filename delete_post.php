
<?php 
    require 'dbinit.php';
	$Post_ID = $_GET[Post_ID];
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	die('Could not connect: ' . mysql_error());
	}

	$sql = "DELETE FROM posts ".
       "WHERE post_id = $Post_ID" ;

	mysql_select_db('simple_blog_db');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	die('Could not delete data: ' . mysql_error());
	}
	echo "Post berhasil dihapus\n";
	mysql_close($conn);
	
	header('Location: index.php');
?>