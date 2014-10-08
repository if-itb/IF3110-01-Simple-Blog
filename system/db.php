<?php

if (!isset($conn) || !mysqli_ping($conn)) {
  $conn = mysqli_connect($CONFIG['mysql']['host'], $CONFIG['mysql']['username'], $CONFIG['mysql']['password'], $CONFIG['mysql']['database']);
}