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
<?php
	include("connect.php");
	$ID = $_GET['ID'];
	$query = mysql_query("
		SELECT *
		FROM post
		WHERE ID = '$ID'
	")or die(mysql_error());
	while($data = mysql_fetch_object($query)){
		$ID = $data->ID;
		$Judul = $data->Judul;
		$Tanggal = $data->Tanggal;
		$Konten = $data->Konten;
	}
?>
    
<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $Tanggal ?></time>
            <h2 class="art-title"><?php echo $Judul ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $Konten ?><p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" onsubmit="getXmlHttpRequest(); return false">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id="komen">
               
			    <div id="ajax">
				<?php
					$connection = mysqli_connect("localhost", "root", "", "blog");
					//$ID = $_GET['ID'];
					$query = mysql_query("
						SELECT * 
						FROM comment
						WHERE ID =".$ID." ORDER BY ID_comment DESC");
					while($data = mysql_fetch_array($query)){
					echo '
					<li class="art-list-item">
					<div class="art-list-item-title-and-time">
					<h2 class="art-list-title"><a href="post.php" >'.$data['Nama'].'</a></h2>
					<div class="art-list-time">'.$data['Tanggal'].'</div>
					</div>
					<p id="komen">'.$data['Komentar'].'</p>
					</li>
					';}
				?>
				</div>
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

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript" src="assets/js/validasi.js"></script>
<script type="text/javascript">

function getXmlHttpRequest(){
	if (checkemail()){
		var xmlHttp;
		if (window.XMLHttpRequest){
			xmlHttp = new XMLHttpRequest();
		}
		else{
			try{
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e){
				try{
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e){
					xmlHttp = false;
				}
			}
		}
		var ID = <?php echo $ID ?>;
		var Nama = encodeURIComponent(document.getElementById('Nama').value);
		var Email = encodeURIComponent(document.getElementById('Email').value);
		var Komentar = encodeURIComponent(document.getElementById('Komentar').value);
		
		xmlHttp.open("GET","submitComment.php?Nama="+Nama+"&Email="+Email+"&Komentar="+Komentar+"&ID="+ID,true);
		xmlHttp.send(null);
		xmlHttp.onreadystatechange=function(){
			if (xmlHttp.readyState==4 && xmlHttp.status==200){
				document.getElementById("ajax").innerHTML = xmlHttp.responseText;
				document.getElementById('Nama').value="";
				document.getElementById('Email').value="";
				document.getElementById('Komentar').value="";
			}
		}
	}
}
</script>
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