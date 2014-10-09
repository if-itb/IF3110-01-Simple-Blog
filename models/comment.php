<?php
  require_once 'system/db.php';

  function readAllComments($id) {
    $conn = getConnection();

    $query = "SELECT * FROM `comments` WHERE `post_id`='$id' ORDER BY `comment_date` DESC"; 
    $result = mysqli_query($conn, $query);

    $response = '';
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_array($result)) {
        $response .= '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$row['comment_author'].'</a></h2><div class="art-list-time">'.datetimeBeautifier($row['comment_date']).'</div></div><p>'.$row['comment_content'].'</p></li>';
      } 
    }

    return $response;
  }

  function createComment($id, $name, $email, $content, $datetime) {
    $conn = getConnection();
      
    $query = "INSERT INTO `comments` (comment_author, comment_author_email, comment_date, comment_content, post_id) VALUES ('$name', '$email', '$datetime', '$content', '$id')";
    mysqli_query($conn, $query);
  }