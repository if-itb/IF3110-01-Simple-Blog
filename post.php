<?php
  require_once 'system/config.php';
  require_once 'models/post.php';
  require_once 'helpers/datetime.php';
  require_once 'helpers/url.php';

  if (!isset($_GET['id'])) {     
    redirect();
  }   
  
  $result = readPost((int) $_GET['id']);
  if ($result->num_rows > 0) { 
    $row = mysqli_fetch_array($result);
    include 'views/post.php';
  }
