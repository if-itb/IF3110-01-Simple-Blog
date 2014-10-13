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

<title>Simple Blog of Bangsatya | Edit Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav" >
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Edit Post</a></li>
    </ul>
</nav>

<article class="art simple post" style="margin-top:50px;">
        <div class="art-body" style="margin-top:70px">
        <div class="art-body-inner">
            <h2>Edit Post</h2>
			<?php
				include("connect.php");
				$query	=	mysql_query("SELECT * from post WHERE no=".$_GET['id']);
				$hasil_eksekusi	=	mysql_fetch_array($query);
				
				$nomor	=	$hasil_eksekusi['no'];
				$judul	=	$hasil_eksekusi['judul'];
				$tanggal	=	$hasil_eksekusi['tanggal'];
				$konten	=	$hasil_eksekusi['konten'];
			echo '
            <div id="contact-area">
				<script>
					setTanggalSekarang();
				</script>
                <form method="post" action="update.php">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="judul" id="Judul" value="'.$judul.'">
		
                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="tanggal" id="Tanggal" value="">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="konten" rows="20" cols="20" id="Konten">'.$konten.'</textarea>
					<input type="hidden" name="nomor" value="'.$nomor.'">
                    <input type="submit" name="submit" value="Simpan" class="submit-button" onclick="return cekInputan();">
                </form>
            </div>
			';
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
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd='0'+dd
    } 
    if(mm<10) {
        mm='0'+mm
    } 
    document.getElementById("Tanggal").value= yyyy + "-" + mm + "-" + dd;
</script>
<script type="text/javascript" src="assets/js/posting_handler.js"></script>
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