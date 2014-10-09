<?php

  if ($ACTION == 'index' || $ACTION == 'list') {
    $result = readAllPosts();
    include('views/post_list.php');
    die();
  }

  if ($ACTION == 'detail') {
    $result = readPost((int) $PARAM);
    if ($result) { 
      $data = mysqli_fetch_array($result);

      include 'views/post_detail.php';
      die();
    } else {
      include 'views/404.php';
      die();
    }
  }

  
  
