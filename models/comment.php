<?php
  require_once 'system/db.php';

  function createComment($id, $name, $email, $content, $datetime) {
    $conn = getConnection();
      
    $query = "INSERT INTO `comments` (comment_author, comment_author_email, comment_date, comment_content, post_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssi', $name, $email, $datetime, $content, $id);
    $stmt->execute();
    $stmt->close();
  }

  function readAllComments($id) {
    $conn = getConnection();

    $query = "SELECT comment_author, comment_date, comment_content FROM `comments` WHERE `post_id`=? ORDER BY `comment_date` DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($author, $date, $content);

    $response = '';
    while ($stmt->fetch()) {
      $response .= '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$author.'</a></h2><div class="art-list-time">'.datetimeBeautifier($date).'</div></div><p>'.$content.'</p></li>';
    }

    $stmt->close();
    return $response;
  }
