<?php

if (!isset($mysql) || !mysqli_ping($mysql)) {
  $mysql = mysqli_connect($CONFIG['mysql']['host'], $CONFIG['mysql']['username'], $CONFIG['mysql']['password'], $CONFIG['mysql']['database']);
}