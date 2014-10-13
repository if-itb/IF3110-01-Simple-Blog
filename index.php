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

<body class="default" onload="dateUIinnerHTML();">
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
			<?php include("get_all_posts.php");
			include("UI.php");

			foreach($posts['post'] as $p) { ?>
			<li class="art-list-item">
				<div class="art-list-item-title-and-time">
				<h2 class="art-list-title"><a href=<?php echo("\"post.php?id=" . $p['id'] . "\""); ?>><?php echo($p['title']); ?></a></h2>
				<div class="art-list-time" id="Tanggal"><?php echo(dateDBToText($p['time'])); ?></div>
				<?php if ($p['featured'] != "0") { ?>
					<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
				<?php } ?>
				</div><p><?php echo(read_more($p['paragraph'], $p['id'])); ?></p>
				<p>
				  <a href=<?php echo("\"edit_post.php?id=" . $p['id'] . "\""); ?>>Edit</a> | <a href=<?php echo("\"delete_post.php?id=" . $p['id'] . "\""); ?> onClick="return deleteConfirmation();">Hapus</a>
				</p>
			</li>
			<?php } ?>
			<!--
			<li class="art-list-item">
				<div class="art-list-item-title-and-time">
					<h2 class="art-list-title"><a href="post.html">Apa itu Simple Blog?</a></h2>
					<div class="art-list-time">15 Juli 2014</div>
					<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
				<p>
				  <a href="#">Edit</a> | <a href="#">Hapus</a>
				</p>
			</li>

			<li class="art-list-item">
				<div class="art-list-item-title-and-time">
					<h2 class="art-list-title"><a href="post.html">Siapa dibalik Simple Blog?</a></h2>
					<div class="art-list-time">11 Juli 2014</div>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
				<p>
				  <a href="#">Edit</a> | <a href="#">Hapus</a>
				</p>
			</li>
			-->
		  </ul>
		</nav>
	</div>
</div>

<footer class="footer">
	<div class="back-to-top"><a href="">Back to top</a></div>
	<!-- <div class="footer-nav"><p></p></div> -->
	<div class="psi">&Psi;</div>
	<aside class="offsite-links">
		IF3110 Pengembangan Aplikasi Berbasis Web /
		<br>
		<a class="twitter-link" href="http://twitter.com/christangga">Christ Angga Saputra - 13512019</a> /
		<br>
		
	</aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/deleteConfirmation.js"></script>

<!--
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
-->
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
