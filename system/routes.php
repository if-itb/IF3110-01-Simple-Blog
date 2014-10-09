<?php
  
  $route = empty($_GET['route']) ? 'post' : $_GET['route'];
  
  $parts = explode('/', $route);
  $CONTROLLER = $parts[0];
  if (isset($parts[1])) {
    $ACTION = $parts[1];
  }

  if (isset($parts[2])) {
    $PARAM = $parts[2];
  }
	
  require 'controllers/'.$CONTROLLER.'.php';