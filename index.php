<?php
  require_once 'system/config.php'; 
  require_once 'models/post.php';
  require_once 'models/comment.php';
  require_once 'helpers/datetime.php';
  require_once 'helpers/url.php';

  $route = empty($_GET['route']) ? 'post' : $_GET['route'];
  
  $parts = explode('/', $route);
  $CONTROLLER = $parts[0];
  if (isset($parts[1])) {
    $ACTION = $parts[1];
  } else {
    $ACTION = 'index';
  }

  if (isset($parts[2])) {
    $PARAM = $parts[2];
  }
  
  require 'controllers/'.$CONTROLLER.'.php';