<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Simple Blog">
<meta name="author" content="Bangsatya">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Simple Blog">
<meta name="twitter:creator" content="Bangsatya Blog">
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

<title>Simple Blog of Bangsatya</title>
</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple-Blog<span>-of-</span>Bangsatya</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
			<?php
				include("connect.php");
				$query	=	mysql_query("SELECT * from post ORDER BY tanggal DESC");
				while($hasil_eksekusi = mysql_fetch_array($query)){
					$nomor	=	$hasil_eksekusi['no'];
					$judul	=	$hasil_eksekusi['judul'];
					$tanggal	=	$hasil_eksekusi['tanggal'];
					$konten	=	$hasil_eksekusi['konten'];
					$isfeatured	=	$hasil_eksekusi['isFeatured'];
					echo '
						<li class="art-list-item">
							<div class="art-list-item-title-and-time">
								<h2 class="art-list-title"><a href="show_post.php?id='.$nomor.'">'.$judul.'</a></h2>
								<div class="art-list-time">'.$tanggal.'</div>
								';
					if($isfeatured==1)
					{
						echo '<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>';
					}
					echo '</div>
							<p>'.$konten.'</p>
							<p>
							  <a href="edit_post.php?id='.$nomor.'">Edit</a> | <a href="#" onclick="return ConfirmDelete('.$nomor.');">Hapus</a>
							</p>
						</li>				
						';
				}
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
<script>
    function ConfirmDelete(nomor)
    {
      var x = confirm("Apakah Anda yakin menghapus post ini?");
      if (x)
          return window.location.assign('delete.php?id='+nomor);
      else
        return false;
    }
</script>
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