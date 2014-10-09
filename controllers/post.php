<?php

  if ($ACTION == 'index' || $ACTION == 'list') {
    $result = readAllPosts();
    include('views/post_list.php');
    die();
  }

  if ($ACTION == 'detail') {
    $result = readPost((int) $PARAM);
   
    if ($result->num_rows > 0) { 
      $data = mysqli_fetch_array($result);

      include 'views/post_detail.php';
      die();

    } else {
      include 'views/404.php';
      die();
    }
  }

  if ($ACTION == 'new' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = new DateTime($_POST['Tanggal']);
    $datetime = $datetime->format('Y-m-d H:i:s');
      
    createPost($_POST['Judul'], $datetime, $_POST['Konten']); 
    redirect();
  }

  if ($ACTION == 'new') {
    include 'views/post_form.php';
    die();
  }

  if ($ACTION == 'edit' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = new DateTime($_POST['Tanggal']);
    $datetime = $datetime->format('Y-m-d H:i:s');
      
    updatePost((int) $_POST['id'], $_POST['Judul'], $datetime, $_POST['Konten']);
    redirect();
  }

  if ($ACTION == 'edit') {
    $result = readPost((int) $PARAM);
    if ($result->num_rows > 0) {
      $data = mysqli_fetch_array($result); 
    }

    include 'views/post_form.php';
    die();
  }

  if ($ACTION == 'delete') {
    deletePost((int) $PARAM);
    redirect();
  }


  include 'views/404.php';
  die();
