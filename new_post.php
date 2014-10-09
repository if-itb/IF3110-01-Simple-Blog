<?php
  require_once 'system/config.php';
  require_once 'models/post.php';
  require_once 'helpers/datetime.php';
  require_once 'helpers/url.php';

  /* {SITEURL}/post/new */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = new DateTime($_POST['Tanggal']);
    $datetime = $datetime->format('Y-m-d H:i:s');
      
    if ($_POST['id'] == '') {
      createPost($_POST['Judul'], $datetime, $_POST['Konten']);
    } else {
      updatePost((int) $_POST['id'], $_POST['Judul'], $datetime, $_POST['Konten']);
    }
    
    redirect();
  }

  /* {SITEURL}/post/edit/id */
  if (isset($_GET['id'])) {   
    $result = readPost((int) $_GET['id']);
    if ($result->num_rows > 0) {
      $data = mysqli_fetch_array($result); 
    }
  }

  include 'views/post_form.php';
  die();
