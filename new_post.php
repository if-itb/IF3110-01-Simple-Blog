<?php
  require_once 'system/config.php';
  require_once 'models/post.php';
  require_once 'helpers/url.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysql_real_escape_string($_POST['Judul']);
    $datetime = new DateTime($_POST['Tanggal']);
    $datetime = $datetime->format('Y-m-d H:i:s');
    $content = mysql_real_escape_string($_POST['Konten']);
      
    if ($_POST['id'] == '') {
      createPost($title, $datetime, $content);
    } else {
      updatePost((int) $_POST['id'], $title, $datetime, $content);
    }
    
    redirect();
  }

  if (isset($_GET['id'])) {   
    $result = readPost((int) $_GET['id']);
    if ($result->num_rows > 0) {
      $data = mysqli_fetch_array($result); 
    }
  }

  include 'views/post_form.php';
  die();
