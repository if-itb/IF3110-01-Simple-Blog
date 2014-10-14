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
<?php 
	include("A_config.php");
	$id = $_GET['post_id'];
	$query = mysql_query("select * from post where post_id = '$id' ") or die("hello");
?>

</head>

<body class="default" onload="loadComment('<?php echo $id; ?>')">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="A_index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="A_new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

 <?php 
	while ($data = mysql_fetch_array($query))
	{
?>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $data['tanggal']; ?></time>
            <h2 class="art-title"><?php echo $data['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
				<?php echo $data['konten']; ?>
            <hr />
			
<?php } ?>            
            <h2>Komentar</h2>

       
                <form onsubmit="addComment('<?php echo $id; ?>'); return false;">
                    <ul><label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama"></ul>
        
                    <ul><label for="email">Email:</label>
                    <input type="text" name="email" id="email"></ul>
                    
                    <ul><label for="komentar">Komentar:</label><br>
                    <textarea name="komen" rows="20" cols="20" id="komen"></textarea></ul>

                    <ul><input type="submit" name="submit" value="Kirim" class="submit-button"></ul>
                </form>

            <ul class="art-list-body">
                <div id="komenList"></div>
            </ul>
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

<script type="text/javascript" src="A_comment.js"></script>
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