<?php
  require_once 'system/db.php';

  function createPost($title, $datetime, $content) {
    $conn = getConnection();
      
    $query = "INSERT INTO `posts` (post_title, post_date, post_content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $title, $datetime, $content);
    $stmt->execute();
    $stmt->close();
  }

  function readAllPosts() {
    $conn = getConnection();

    $query = "SELECT * FROM `posts` ORDER BY `post_date` DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
  }

  function readPost($id) { 
    $conn = getConnection();

    $query = "SELECT * FROM `posts` WHERE `post_id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
  }

  function updatePost($id, $title, $datetime, $content) {
    $conn = getConnection();
      
    $query = "UPDATE `posts` SET `post_title`=?,`post_date`=?,`post_content`=? WHERE `post_id`=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $title, $datetime, $content, $id);
    $stmt->execute();
    $stmt->close();;
  }

  function deletePost($id) {
    $conn = getConnection();

    $query = "DELETE FROM `posts` WHERE `post_id`=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
  }
