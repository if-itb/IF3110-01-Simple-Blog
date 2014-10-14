<?php
	$id = $_GET["id"];
	$con = mysqli_connect("localhost", "root", "", "simpleblog");
	if (!mysqli_connect_errno()) {
		$result = mysqli_query($con, "SELECT * from post WHERE id=".$id);
		while($row = mysqli_fetch_array($result)){
			$id = $row["id"];
			$title = $row["title"];
			$date = $row["date"];
			$content = $row["content"];
		}
		mysqli_close($con);
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

<title>Simple Blog | Tambah Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-header">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form method="post" action="EditShow.php">
                    <label for="Title">Title:</label>
                    <input type="text" name="Title" id="Title" value="<?php echo $title;?>">

                    <label for="Date">Date:</label>
                    <input type="text" name="Date" id="Date" value="<?php echo $date;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <label for="Content">Content:</label><br>
                    <textarea name="Content" rows="20" cols="20" id="Content"><?php echo $content;?></textarea>

                    <input type="submit" name="submit" value="Submit" class="submit-button">
                </form>
            </div>
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
<?php
	//make connection
	$con = mysqli_connect("localhost", "root", "", "simpleblog");

	$id=$_GET["id"];

	//check connection
	if (!mysqli_connect_errno()) {
		$result = mysqli_query($con, "SELECT * FROM post where id=".$id);
		
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
			echo "<span> Title: </span> <input id='Title' name='Title' placeholder='Title' type='text' value=".$row["Title"]."></input>";
			echo "<br>";
			echo "<span> Date: </span> <input id='Date' name='Date' placeholder='YYYY-MM-DD' type='text' value=".$row["Date"]."></input>";
			echo "<br>";
			echo "<div class='formLabel'> Content: </div> <textarea id='Content' name='Content'>".$row["Content"]."</textarea>";
			echo "<br>";
			echo "<input id='hidden' name='hidden' value=".$row["id"]."> </input>";
		}
		mysqli_close($con);
	}
?>
</html>