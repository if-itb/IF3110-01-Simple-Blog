<?php
  require_once 'system/config.php';
  require_once 'models/comment.php';
  require_once 'helpers/datetime.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST['postid'];
    $name = mysql_real_escape_string($_POST['name']);
    $email = $_POST['email'];
    $content = mysql_real_escape_string($_POST['content']);
    $datetime = new DateTime();
    $datetime = $datetime->format('Y-m-d H:i:s'); 

    createComment($id, $name, $email, $content, $datetime);

  } else {
    echo readAllComments((int) $_GET['postid']);      
  }
