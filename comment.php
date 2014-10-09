<?php
  require_once 'system/config.php';
  require_once 'models/comment.php';
  require_once 'helpers/datetime.php';

  /* {SITEURL}/comment/new */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = new DateTime();
    $datetime = $datetime->format('Y-m-d H:i:s'); 

    createComment((int) $_POST['postid'], $_POST['name'], $_POST['email'], $_POST['content'], $datetime);

  /* {SITEURL}/comment/view/id */
  } else {
    echo readAllComments((int) $_GET['postid']);      
  }
