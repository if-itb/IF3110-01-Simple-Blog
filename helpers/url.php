<?php
  require_once 'system/config.php';

  function redirect($controller = "post") {
    header("Location: ". $GLOBALS['CONFIG']['siteurl']."/".$controller);
    die();
  }