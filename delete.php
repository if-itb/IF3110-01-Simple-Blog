<?php

	include_once('resources/init.php');
	if(isset($_GET['id'])){
      delete_post($_GET['id']);
      header('Location: index.php');
      die();
    } 
?>