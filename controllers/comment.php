<?php
  if ($ACTION == 'index' || $ACTION == 'list') {
     echo readAllComments((int) $PARAM);
     die();
  }

  if ($ACTION == 'new' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = new DateTime();
    $datetime = $datetime->format('Y-m-d H:i:s'); 

    createComment((int) $_POST['postid'], $_POST['name'], $_POST['email'], $_POST['content'], $datetime);
  }

  include 'views/404.php';
  die();
