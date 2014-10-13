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
<div class="wrapper">

<nav class="nav">
    <a name="top"></a>
	<a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<?php
	include('connectdb.php');
	$pid = $_GET['pid'];
	$query = mysql_query("SELECT * FROM post where pid = '$pid'") or die (mysql_error());
	$row = mysql_fetch_assoc($query);
	$judul = $row['judul'];
	$tanggal = $row['tanggal'];
	$konten = $row['konten'];
	echo "<article class=\"art simple post\">
		<h2 class=\"art-title\" style=\"margin-bottom:40px\">-</h2>
			<div class=\"art-body\">
				<div class=\"art-body-inner\">
					<h2>Edit Post</h2>
						<div id=\"contact-area\">
							<form method=\"post\" action=\"updatepost.php\" onsubmit=\"return validasi();\">
								<label for=\"Judul\">Judul:</label>
								<input type=\"hidden\" name=\"pid\" id=\"pid\" value=\"".$pid."\">
								<input type=\"text\" name=\"judul\" id=\"judul\" required value=\"".$judul."\">

								<label for=\"Tanggal\">Tanggal:</label>
								<input type=\"text\" name=\"tanggal\" id=\"tanggal\" required value=".$tanggal.">
							
								<label for=\"Konten\">Konten:</label><br>
								<textarea name=\"konten\" rows=\"20\" cols=\"20\" id=\"konten\" required>".$konten."</textarea>

								<input type=\"submit\" name=\"submit\" value=\"Update\" class=\"submit-button\">
							</form>
						</div>
				</div>
			</div>
		</article>";
?>

<footer class="footer">
    <div class="back-to-top"><a href="#top">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Tugas IF3110 / Simple-Blog
        <br>
        <a class="twitter-link" href="https://www.facebook.com/eldwin.christian.5">Eldwin Christian</a> / 13512002
        <br>
    </aside>
</footer>

</div>

<script type="text/javascript" src="validasitanggal.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>