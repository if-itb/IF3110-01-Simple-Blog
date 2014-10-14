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

<title>Simple Blog | Edit Post</title>


</head>

<body class="default">
<a name="top"></a>
<div class="wrapper">

<nav class="nav">
	<a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
	<ul class="nav-primary">
		<li><a href="new_post.html">+ Tambah Post</a></li>
	</ul>
</nav>

<article class="art simple post">
	
	
	<h2 class="art-title" style="margin-bottom:40px">-</h2>

	<div class="art-body">
		<div class="art-body-inner">
			<h2>Edit Post</h2>

			<div id="contact-area">
<?php				
include 'mysql.php';
$tempID = $_GET['post_ID'];

echo "<form method=\"post\" action=\"apply_post.php?post_ID=$tempID\">";

$sql1 = "SELECT * FROM `post_ID` WHERE `post_ID` = '$_GET[post_ID]'";
if (isset($_GET['post_ID'])){
    $query = @mysql_query($sql1);
}

mysql_close();
if (mysql_num_rows($query) > 0){
    $row = mysql_fetch_array($query);
}
echo					"<label for=\"Judul\">Judul:</label>";
echo 					"<input type=\"text\" name=\"Judul\" id=\"Judul\" value= \"". $row['posted_title'] ."\">";
echo					"<label for=\"Tanggal\">Tanggal:</label>";
echo					"<input type=\"text\" name=\"Tanggal\" id=\"Tanggal\" value= \"". $row['posted_Date'] ."\">";
echo					"<label for=\"Konten\">Konten:</label><br>";
echo					"<textarea name=\"Konten\" rows=\"20\" cols=\"20\" id=\"Konten\">" .$row['posted_body'] . "</textarea>";
echo					"<input type=\"submit\" name=\"submit\" value=\"Apply\" class=\"submit-button\">";

?>				</form>
			</div>
		</div>
	</div>

</article>

<footer class="footer">
	<div class="back-to-top"><a href="#top">Back to top</a></div>
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

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
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