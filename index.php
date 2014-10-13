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
	
	<body class="default">
		
	<?php include 'header.php';?>


<div class="wrapper">
			<div id="home">
				<div class="posts">
					<nav class="art-list">
					  <ul class="art-list-body">
						<?php
							$con = mysqli_connect("localhost","root","","if3110-tugas1");
							if (mysqli_connect_errno()) {
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$result = mysqli_query($con, "SELECT * FROM post ORDER BY tanggal_post DESC");
							
							while($row = mysqli_fetch_array($result)) {
								echo "<li class=\"art-list-item\">";
								echo "<div class=\"art-list-item-title-and-time\">";
								echo "<h2 class=\"art-list-title\"><a href=\"post.php?postId=".$row['id_post']."\">".$row['judul']."</a></h2>";
								echo "<div class=\"art-list-time\">".$row['tanggal_post']."</div>";
								echo "</div>";
								$isi_dr_db = $row['konten'];
								//echo "<p> pjgnya ".strlen($row['konten']). "</p>";
								echo "<p>".substr($isi_dr_db,0,300);
								if (strlen($isi_dr_db) > 300) echo "...";
								echo "</p>";
								echo "<br>";
								echo "<p>";
								echo "<a href=\"modify_post.php?postId=".$row['id_post']."\">Edit</a> | <button onclick=\"onClickDelete(".$row['id_post'].")\">Hapus</button>";
								echo "</p>";
								echo "</li>";
							}
							mysqli_close($con);
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

		<script type="text/javascript" src="assets/js/fittext.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="assets/js/respond.min.js"></script>
		<script type="text/javascript">			
			function onClickDelete(id) {
				if (confirm('Apakah Anda yakin menghapus post ini?')) {
					window.location.href = "delete.php?postId=" + id;
				}
			}
		</script>

	</body>
</html>