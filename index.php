<?php
  require_once 'system/config.php'; 
  require_once 'models/post.php';
  require_once 'helpers/datetime.php';
  require_once 'helpers/url.php';

  if (isset($_GET['id'])) {
    deletePost((int) $_GET['id']);
    redirect();
  }

  $result = readAllPosts();
  include('views/post_list.php');
  die();