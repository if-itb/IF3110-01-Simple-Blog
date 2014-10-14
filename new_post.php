<?php
	require_once(dirname(__FILE__).'/db_controller.php');
	
	$db = new DB();
	if (isset($_POST["judul"])) {
		$judul = $_POST["judul"];
		$tanggal = $_POST["tanggal"];
		$konten = $_POST["konten"];
		$id = $db->post($judul, $tanggal, $konten);
		header("location: post.php?id=" . $id);
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

<title>Azaky Blog | Tambah Post</title>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
	<a style="border:none;" id="logo" href="index.php"><h1>Azaky<span>-</span>Blog</h1></a>
	<ul class="nav-primary">
		<li><a href="new_post.php">+ Tambah Post</a></li>
	</ul>
</nav>

<article class="art simple post">
	
	
	<h2 class="art-title" style="margin-bottom:40px">-</h2>

	<div class="art-body">
		<div class="art-body-inner">
			<h2>Tambah Post</h2>

			<div id="contact-area">
				<form method="post" id="form-post">
					<label for="Judul">Judul:</label>
					<input type="text" name="judul" id="_judul" required>

					<label for="Tanggal">Tanggal:</label>
					<input type="date" name="tanggal" id="_tanggal" required>
					
					<label for="Konten">Konten:</label><br>
					<textarea name="konten" rows="20" cols="20" id="_konten" required></textarea>

					<input type="submit" name="submit" value="Simpan" class="submit-button">
				</form>
			</div>
		</div>
	</div>

</article>

<footer class="footer">
		<div class="back-to-top"><a href="#">Back to top</a></div>
		<div class="psi">&Psi;</div>
		<aside class="offsite-links">
			Ahmad Zaky | <a href="mailto:13512076@std.stei.itb.ac.id">13512076</a></br>
			<a class="twitter-link" href="http://github.com/azaky">GitHub</a>
		</aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/validator.js"></script>

</body>
</html>