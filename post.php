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
		function printReadableDateFormat($tanggal) {
		$rawDate = substr($tanggal, 0, 10);
		$splitDate = explode("-", $rawDate);
		switch ($splitDate[1]) {
			case 1: $month = 'Januari'; break;
			case 2: $month = 'Februari'; break;
			case 3: $month = 'Maret'; break;
			case 4: $month = 'April'; break;
			case 5: $month = 'Mei'; break;
			case 6: $month = 'Juni'; break;
			case 7: $month = 'Juli'; break;
			case 8: $month = 'Agustus'; break;
			case 9: $month = 'September'; break;
			case 10: $month = 'Oktober'; break;
			case 11: $month = 'November'; break;
			case 12: $month = 'Desember'; break;
			default: break;
		}
		echo $splitDate[2].' '.$month.' '.$splitDate[0];
	}
							
		if (isset($_GET['p'])) {  
			$postId = $_GET['p'];
			$connDb = mysqli_connect("localhost", "root", "", "simple_blog");
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}       

			$sqlQuery = "SELECT * FROM `simple_blog`.`post` WHERE `id_post` = '$postId'";
			$result = mysqli_query($connDb, $sqlQuery);
			$post = mysqli_fetch_array($result);        
			mysqli_close($connDb);
		}
?>

<article class="art simple post">
	
	<header class="art-header">
		<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
			<time class="art-time"><?php printReadableDateFormat($post['tanggal']); ?></time>
			<h2 class="art-title"><?php echo $post['judul'] ?></h2>
			<p class="art-subtitle"></p>
		</div>
	</header>

	<div class="art-body">
		<div class="art-body-inner">
			<hr class="featured-article" />
			<p><?php echo $post['content'] ?></p>						

			<hr />
			
			<h2>Komentar</h2>

			<div id="contact-area">
				<form method="post" action="#">
					<input type="hidden" name="IdPost" id="IdPost" value="<?php if (isset($_GET['p'])) echo $_GET['p']; ?>">

					<label for="Nama">Nama:</label>
					<input type="text" name="Nama" id="Nama">

					<label for="Email">Email:</label>
					<input type="text" name="Email" id="Email" onkeyup="validateEmail()" onchange="validateEmail()">
					
					<label for="Komentar">Komentar:</label><br>
					<textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

					<input type="submit" name="submit" value="Kirim" class="submit-button" id="SubmitKomentar" onclick="sendComment(); return false	">
				</form>
			</div>

			<ul class="art-list-body" id="komentar-placeholder">
				
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
<script type="text/javascript">
	function validateEmail() {
		var email = document.getElementById("Email").value;
		var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var result = pattern.test(email);		
		
		if (!result) {			
			document.getElementById("Email").style["background-color"] = "#ffaaaa";
			document.getElementById("SubmitKomentar").disabled = true;
		} else {
			document.getElementById("Email").style["background-color"] = "#aaffaa";
			document.getElementById("SubmitKomentar").disabled = false;
		}
		return result;
	}

	function sendComment() {
		var idPost = encodeURIComponent(document.getElementById("IdPost").value);
		var nama = encodeURIComponent(document.getElementById("Nama").value);
		var email = encodeURIComponent(document.getElementById("Email").value);
		var komentar = encodeURIComponent(document.getElementById("Komentar").value);		
		
		if (!validateKomentar(nama, email, komentar)) {
			return false;
		}

		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				existingComment = document.getElementById("komentar-placeholder").innerHTML;
				document.getElementById("komentar-placeholder").innerHTML = existingComment + xmlhttp.responseText;
				
				document.getElementById("Nama").value = '';
				document.getElementById("Email").value = '';
				document.getElementById("Komentar").value = '';
			}
		}
				
		var parameters = "idpost=" + idPost + "&nama=" + nama + "&email=" + email + "&komentar=" + komentar;
		xmlhttp.open("POST", "send_comment.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		xmlhttp.send(parameters);
	}

	window.onload = loadComment();

	function loadComment() {
		var idPost = encodeURIComponent(document.getElementById("IdPost").value);

		var xmlhttp;
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("komentar-placeholder").innerHTML = xmlhttp.responseText;
			}
		}
				
		var parameters = "idpost=" + idPost;
		xmlhttp.open("GET", "load_comment.php?" + parameters, true);		
		xmlhttp.send(null);
	}

	function validateKomentar(nama, email, komentar) {
		if (isEmpty(nama)) {
			alert('Kolom nama tidak boleh kosong');
			return false;
		}
		if (isEmpty(email)) {
			alert('Kolom email tidak boleh kosong');
			return false;
		}
		if (isEmpty(komentar)) {
			alert('Kolom komentar tidak boleh kosong');
			return false;
		}
		if (!validateEmail()) {
			alert('Email tidak valid');
			return false;	
		}
		
		return true;
	}

	function isEmpty(val){
		return (val === undefined || val == null || val.length <= 0) ? true : false;
	}	
</script>
</body>
</html>