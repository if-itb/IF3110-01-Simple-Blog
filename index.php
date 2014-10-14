<?php
    require("assets/php/posts.inc");
            
    $postsArray=array();
    try{
        $db = new PDO("mysql:host=localhost;dbname=simple-blog","root","");

        $numberOfArrayElements = 0;
        $query = "SELECT * FROM `posts`";
            foreach($db->query($query) as $row){
                 $numberOfArrayElements++;
                $postsArray[] = new Posts($row['Title'],$row['Date'],$row['Content']);
                $postsArray[$numberOfArrayElements-1]->setPostID($row['Post_ID']);
            }

        $db = null;
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    
    function showPosts(){
        global $postsArray;
        foreach($postsArray as $posts){
            $content = $posts->getContent();
            if (strlen($content)>100){
                $content = substr($content,0,100)."...";
            }
           echo "<li class=\"art-list-item\">\n";
            echo "  <div class=\"art-list-item-title-and-time\">\n";
            echo "      <h2 class=\"art-list-title\"><a href=\"post.php?postID=".$posts->getPostID()."\">".$posts->getTitle()."</a></h2>\n";
            echo "      <div class=\"art-list-time\">".$posts->getDateNumber()." ".$posts->getMonthName()." ".$posts->getYear()."</div>\n";
            echo "      <div class=\"art-list-time\"><span style=\"color:#F40034;\">&#10029;</span> Featured</div>\n";
            echo "  </div>\n";
            echo "  <p>".$content."</p>\n";
            echo "  <p>\n";
            echo "  <a href=\"edit_post.php?postID=".$posts->getPostID()."\">Edit</a> | <a href=\"assets/php/delete_post_handler.php?";
            echo "postID=".$posts->getPostID()."\"";
            echo "onclick=\"onDeleteClick(event);\">Hapus</a>\n";
            echo "</li>\n"; 
        }
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
    <a style="border:none;" id="logo" href="index.html"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php
                showPosts();
            ?>
          </ul>
        </nav>
    </div>
</div>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>
<script type="text/javascript" src="assets/js/index.js"></script>>

</body>
</html>