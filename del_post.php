<?php
    require "db_handler.php";
  if (!isset($_GET['post_id'])){
    throw new Exception("Missing parameter: post_id");
  }
    
    $id = $_GET['post_id'];
    $sql = "DELETE FROM `tb_post` WHERE `tb_post`.`post_id` = $id";
    mysql_query($sql);
    header("Location: index.php");
?>
