<?php
  require_once 'system/config.php';
  require_once 'models/post.php';
  require_once 'helpers/datetime.php';
  require_once 'helpers/url.php';

  /* {SITEURL}/post/view */
  if (!isset($_GET['id'])) {     
    include 'views/404.php';
    die();
  }

  /* {SITEURL}/post/view/id */
  $result = readPost((int) $_GET['id']);
  if ($result->num_rows <= 0) { 
    include 'views/404.php';
    die();
  }

  $data = mysqli_fetch_array($result);
  include 'views/post.php';
  die();
