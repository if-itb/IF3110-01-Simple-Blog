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

<title>Simple Blog | Apa itu Simple Blog?</title>


</head>

<body class="default" onload="commentAjax()">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Add New Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">

            <?php
                //make connection
                $con = mysqli_connect("localhost", "root", "", "simpleblog");
                
                //check connection
                if (!mysqli_connect_errno()) {
                    $result = mysqli_query($con, "SELECT * FROM post where id=".$_GET["id"]);

                    echo "<div>";
                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                        $content = $row["content"];
                        echo "<time class=\"art-time\">".$row["date"]."</time>";
                        echo "<h2 class=\"art-title\">".$row["title"]."</h2>";
                    }
                    echo "</div>";
                }
            ?>

            <p class="art-subtitle"></p>
        </div>
    </header>


    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php
            echo "<p>".$content."</p>";
            mysqli_close($con);
            ?>
            <hr />
            
            <h2>Comments</h2>
            <div id="CommentList">

            </div>
            <div id="contact-area">
                <form method="post" action="#">
                    <label for="Name">Name:</label>
                    <input type="text" name="Name" id="Name">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">

                    <input type="hidden" name="Date" id="Date" value="<?php echo date("Y-m-d");?>">
                    
                    <label for="Comment">Comment:</label><br>
                    <textarea name="Comment" rows="20" cols="20" id="Comment"></textarea>

                    <input type="button" onclick="addComment()" name="submit" value="Submit" class="submit-button">
                </form>
            </div>


<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["Title"];
    $date = $_POST["Date"];
    $content = $_POST["Content"];

    //make connection
    $con = mysqli_connect("localhost", "root", "", "simpleblog");


    if (!mysqli_connect_errno()) {
        $var = mysqli_query($con, "SELECT MAX(id) as 'id' FROM post");
        $last = mysqli_fetch_array($var, MYSQL_ASSOC);
        $result = mysqli_query($con, "INSERT INTO post VALUES ( ".($last["id"]+1).", '".$title."', '".$date."', '".$content."')");
        $url = '../IF3110-01-Simple-Blog/index.php';
        mysqli_close($con);
        header( "Location: $url" ); 
    }
    echo $title;
      }
?>

        </div>
    </div>

</article>

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

<script type="text/javascript" src="assets/js/Comment.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>

</body>
</html>