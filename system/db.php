<?php
  require_once 'system/config.php';

  $conn = mysqli_connect($CONFIG['mysql']['host'], $CONFIG['mysql']['username'], $CONFIG['mysql']['password'], $CONFIG['mysql']['database']);
