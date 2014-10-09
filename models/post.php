<?php
  require_once 'system/db.php';

  function getAllPosts() {
    $query = "SELECT * FROM `posts` ORDER BY `post_date` DESC";
    $result = mysqli_query($GLOBALS['conn'], $query);
    return $result;
  }

  function deletePost($id) {
    $query = "DELETE FROM `posts` WHERE `post_id`='$id'";
    mysqli_query($GLOBALS['conn'], $query);
  }
