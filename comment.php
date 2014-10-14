<?php

	include_once('resources/init.php');
	if(isset($_GET['id'])){
	  $postid = $_GET['id'];
      header('Location: post.php?id=<?php echo $postid;?>');
      die();
    } 
?>