<?php
	header("Location: index.php"); 
    require ('sql_connect.inc');
    sql_connect('blog');

    $id = $_GET['id'];
    mysql_query("DELETE FROM blog WHERE id=$id");
?>
