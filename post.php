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

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<?php
require("connect_database.php");
$id2 = $_REQUEST["id"];
$result = mysqli_query($con, "SELECT * FROM post WHERE id='$id2'");
$row = mysqli_fetch_array($result);
?>

<?php
function convertDate($date) {
	$arr = explode("-", $date);
	$daftar = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
					"Oktober", "November", "Desember");
	$bulan = $daftar[(int)$arr[1]-1];
	$ret = $arr[2];
	$ret .= " ";
	$ret .= $bulan;
	$ret .= " ";
	$ret .= $arr[0];
	return $ret;
}
?>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo convertDate($row["tanggal"]); ?></time>
            <h2 class="art-title"><?php echo $row["judul"]; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
			<p><?php echo str_replace("\n", "<br>", $row["konten"]); ?></p>
            <hr />
            
            <h2>Komentar</h2>

			<script type="text/javascript">
			function hitungAt(email) {
				var i;
				var count=0;
				for (i=0; i<email.length; i++) {
					if (email.charAt(i) == '@') {
						count++;
					}
				}
				return count;
			}
			function cekEmail(email) {
				var at = email.indexOf("@");
				var dot = email.lastIndexOf(".");
				if (hitungAt(email)>1 || at<1 || dot<at+2 || dot+2 > email.length) {
					return false;
				}
				return true;
			}
			function validateEmail(email) {
				if(email.length > 0) {
					return cekEmail(email);
				} else {
					return false;
				}
			}
			function addKomen() {
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				var namaKomen = document.getElementById("Nama").value;
				var emailKomen = document.getElementById("Email").value;
				var komen = document.getElementById("Komentar").value;
				
				if (namaKomen.length == 0) {
					alert("Isikan nama");
					return false;
				}
				if (validateEmail(emailKomen) == false) {
					alert("Email tidak valid!");
					return false;
				}
				if (komen.length == 0) {
					alert("Isikan komen!");
					return false;
				}
				xmlhttp.open("POST", "add_komentar.php?id=" + <?php echo'"'; echo $_REQUEST["id"]; echo'"'; ?>, true);
				xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlhttp.onreadystatechange=function() {
					if(xmlhttp.readyState==4 && xmlhttp.status==200) {
						document.getElementById("daftar-komen").innerHTML = xmlhttp.responseText;
						document.getElementById("Nama").value = "";
						document.getElementById("Email").value = "";
						document.getElementById("Komentar").value = "";
					}
				}
				xmlhttp.send("nama=" + namaKomen + "&email=" + emailKomen + "&komen=" + komen);
				return true;
			}
			</script>			
			
            <div id="contact-area">
                <form method="post" action="#" onsubmit="addKomen(); return false">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama" required="true">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" required="true">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar" required="true"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
			
			
            <ul id="daftar-komen" class="art-list-body">
                <script type ="text/javascript">
				var xmlhttp;
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.open("GET", "get_komentar.php?id="+<?php echo'"'; echo $_REQUEST["id"]; echo '"';?>, true);
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("daftar-komen").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.send();
				</script>	
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
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>

<?php
mysqli_close($con);
?>

</body>
</html>