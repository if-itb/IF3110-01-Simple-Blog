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

<?php 
	if (isset($_GET['p'])) { 
		include 'dbconnect.php';
		
		$postId = $_GET['p'];		
		$sqlQuery = "SELECT * FROM `simple_blog`.`post` WHERE `id_post` = '$postId'";
		$result = mysqli_query($connDb, $sqlQuery);
		$post = mysqli_fetch_array($result);	
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
	
	
	<h2 class="art-title" style="margin-bottom:40px">-</h2>

	<div class="art-body">
		<div class="art-body-inner">
			<h2><?php if (!isset($_GET['p'])) echo 'Tambah Post'; else echo 'Edit Post'; ?></h2>

			<div id="contact-area">
				<form method="post" action="save_post.php">
					<label for="Judul">Judul:</label>
					<input type="text" name="Judul" id="Judul" value="<?php if (isset($_GET['p'])) echo $post['judul']; ?>">

					<label for="Tanggal">Tanggal:</label>
					<?php if (isset($_GET['p'])) { $rawDate = substr($post['tanggal'], 0, 10); $splitDate = explode("-", $rawDate); $date = $splitDate[1].'/'.$splitDate[2].'/'.$splitDate[0]; } ?>
					<input type="text" name="Tanggal" id="Tanggal" placeholder="mm/dd/yyyy" value="<?php if (isset($_GET['p'])) echo $date; ?>">
					
					<label for="Konten">Konten:</label><br>
					<textarea name="Konten" rows="20" cols="20" id="Konten"><?php if (isset($_GET['p'])) echo $post['content']; ?></textarea>

					<?php if (isset($_GET['p'])) { ?>
						<input type="hidden" name="EditMode" value="<?php echo $_GET['p']; ?>" id="EditMode">
					<?php } ?>
					<input type="submit" name="submit" value="Simpan" class="submit-button" onclick="return validate()">
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
<script type="text/javascript">
	function validate() {
		var judul = document.getElementById("Judul").value;        
		var content = document.getElementById("Konten").value;
		var validDateFormat = true;
		var rawDate, tanggal;
		try {
			rawDate = document.getElementById("Tanggal").value.split("/");
			tanggal = new Date(rawDate[2], rawDate[0], rawDate[1] - 1);
		} catch(exception) {
			validDateFormat = false;
		}
		var today = new Date();

		if (isEmpty(judul)) {
			alert("Judul tidak boleh kosong");
			return false;            
		}
		if (validDateFormat) {            
			if (!compareDate(tanggal, today)) {
				alert("Format tanggal tidak valid");
				return false;
			}
		} else {
			alert("Format tanggal tidak valid");        
			return false;
		}
		if (isEmpty(content)) {
			alert("Konten tidak boleh kosong");  
			return false;
		}

		return true;
	}

	function compareDate(tanggal, today) {        
		if (tanggal.getFullYear() > today.getFullYear())
			return true;
		if (tanggal.getFullYear() < today.getFullYear())
			return false;
		if (tanggal.getMonth() > today.getMonth())
			return true;
		if (tanggal.getMonth() < today.getMonth())
			return false;
		if (tanggal.getDate() >= today.getDate())
			return true;
		if (tanggal.getDate() < today.getDate())
			return false;
	}

	function isEmpty(val){
		return (val === undefined || val == null || val.length <= 0) ? true : false;
	}

</script>

</body>
</html>