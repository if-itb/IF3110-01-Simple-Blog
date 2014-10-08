<?php require 'config.php'; ?>

<?php 
  include 'db.php';

  $id = (int) $_POST['postid'];
  $name = mysql_real_escape_string($_POST['name']);
  $email = $_POST['email'];
  $content = mysql_real_escape_string($_POST['content']);
  $datetime = new DateTime();
  $datetime = $datetime->format('Y-m-d H:i:s'); 

  $query = "INSERT INTO `comments` (comment_name, comment_email, comment_date, comment_content, post_id) VALUES ('$name', '$email', '$datetime', '$content', '$id')";

  mysqli_query($conn, $query);

  $response = '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$name.'</a></h2><div class="art-list-time">'.$datetime.'</div></div><p>'.$content.'</p></li>';  

  echo $response;
    