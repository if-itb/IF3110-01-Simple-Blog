<?php require 'config.php'; ?>

<?php 
  include 'db.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST['postid'];
    $name = mysql_real_escape_string($_POST['name']);
    $email = $_POST['email'];
    $content = mysql_real_escape_string($_POST['content']);
    $datetime = new DateTime();
    $datetime = $datetime->format('Y-m-d H:i:s'); 

    $query = "INSERT INTO `comments` (comment_author, comment_author_email, comment_date, comment_content, post_id) VALUES ('$name', '$email', '$datetime', '$content', '$id')";

    mysqli_query($conn, $query);

  } else {
    $id = (int) $_GET['postid'];
    $query = "SELECT * FROM `comments` WHERE `post_id`='$id' ORDER BY `comment_date` DESC"; 
    $result = mysqli_query($conn, $query);

    $response = '';
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_array($result)) {
        $response .= '<li class="art-list-item"><div class="art-list-item-title-and-time"><h2 class="art-list-title"><a href="#">'.$row['comment_author'].'</a></h2><div class="art-list-time">'.$row['comment_date'].'</div></div><p>'.$row['comment_content'].'</p></li>';
      } 
    }
    echo $response;      
  }
