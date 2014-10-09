<?php
  require_once 'system/config.php';

  function redirect($controller = "index") {
    header("Location: ". $GLOBALS['CONFIG']['siteurl']."/".$controller.".php");
    die();
  }