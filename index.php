<?php
require_once dirname(__FILE__)."/assets/db/db_connection.php";

$db = null;
$posts = null;
try {
    // connect
    $db = Database::getInstance()->getHandle();

    // grab the posts
    $statement = $db->prepare("SELECT * FROM (SELECT * FROM ".Database::$table_post." ORDER BY tanggal DESC) ORDER BY featured DESC");
    $posts = $statement->execute();
} catch (Exception $e) {
    die("Database error: ".$e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
          <?php
          // check if empty
          $count = 0;
          while($post = $posts->fetchArray()) {
            $count++;
            $id = $post['id'];
          ?>
            <li class="art-list-item">
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a id=<?php echo '"post-title'.$id.'"'; ?> href=<?php echo '"post.php?method=view&id='.$id.'"';?>><?php echo $post['judul']; ?></a></h2>
                    <div class="art-list-time"><?php 
                    $date = new DateTime($post['tanggal']);
                    echo $date->format("l, j F Y");
                    ?></div>
                    <?php if($post['featured'] == 1): ?>
                      <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
                    <?php endif; ?>
                </div>
                <p><?php echo substr($post['konten'], 0, 200); ?>&hellip;</p>
                <p>
                  <a href=<?php echo '"new_post.php?id='.$post['id'].'"'?>>Edit</a> | <a href=<?php echo '"javascript:deletePost('.$id.')"';?>>Hapus</a>
                </p>
            </li>
          <?php } 
          if($count == 0):?>
          <li class="art-list-item">
            <p>No post available!</p>
          </li>
          <?php endif;?>
          </ul>
        </nav>
    </div>
</div>

<footer class="footer">
    <div class="back-to-top"><a href="#">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="" href="#">Renusa</a> /
        <a class="" href="#">Kelvin</a> /
        <a class="" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<!--<script type="text/javascript" src="assets/js/fittext.js"></script>-->
<!--<script type="text/javascript" src="assets/js/app.js"></script>-->
<script type="text/javascript">
  function deletePost(id) {
    var postTitle = document.getElementById("post-title" + id).innerHTML;
    
    var confirmDelete = confirm("Are you sure you want to delete post '" + postTitle + "'?");

    if(confirmDelete == true) {
      window.location.replace(document.URL.substr(0,document.URL.lastIndexOf('/')) + "/post.php?method=delete&id=" + id);
    }
  }
</script>

</body>
</html>

