<?php
  require_once 'system/config.php';

  function getConnection() {
    if (!isset($GLOBALS['conn']) || !mysqli_ping($GLOBALS['conn'])) {
      $GLOBALS['conn'] = mysqli_connect($GLOBALS['CONFIG']['mysql']['host'], $GLOBALS['CONFIG']['mysql']['username'], $GLOBALS['CONFIG']['mysql']['password'], $GLOBALS['CONFIG']['mysql']['database']);
    }
    return $GLOBALS['conn'];
  }