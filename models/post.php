<?php
  require_once 'system/db.php';

  function createPost($title, $datetime, $content) {
    $conn = getConnection();
      
    $query = "INSERT INTO `posts` (post_title, post_date, post_content) VALUES ('$title', '$datetime', '$content')";
    mysqli_query($conn, $query);
  }

  function readAllPosts() {
    $conn = getConnection();
    $query = "SELECT * FROM `posts` ORDER BY `post_date` DESC";
    $result = mysqli_query($GLOBALS['conn'], $query);
    return $result;
  }

  function readPost($id) { 
    $conn = getConnection();
    $query = "SELECT * FROM `posts` WHERE `post_id` = '$id'";
    $result = mysqli_query($conn, $query);
    return $result;
  }

  function updatePost($id, $title, $datetime, $content) {
    $conn = getConnection();
      
    $query = "UPDATE `posts` SET `post_title`='$title',`post_date`='$datetime',`post_content`='$content' WHERE `post_id`='$id'";
    mysqli_query($conn, $query);
  }

  function deletePost($id) {
    $conn = getConnection();
    $query = "DELETE FROM `posts` WHERE `post_id`='$id'";
    mysqli_query($conn, $query);
  }
