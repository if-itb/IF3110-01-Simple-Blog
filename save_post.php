<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'db.php';

  $title = mysql_real_escape_string($_POST["Judul"]);
  $datetime = new DateTime($_POST["Tanggal"]);
  $datetime = $datetime->format('Y-m-d H:i:s');
  $content = mysql_real_escape_string($_POST["Konten"]);
    
  $query = "INSERT INTO `posts` (post_title, post_date, post_content) VALUES ('$title', '$datetime', '$content')";
  mysqli_query($conn, $query);
  
  header("Location: ". $CONFIG['siteurl']."/index.php");
  die();
}