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
<?php
    $con=mysqli_connect("localhost", "root", "chmod777", "blog");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " .mysqli_connect_error();
    }
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM post_table WHERE id=$id");
    while ($row = mysqli_fetch_array($result)) {
        $title=$row['title'];
        $date=$row['date'];
        $content=$row['content'];
    }
?>

<title>
    Simple Blog | <?php
        echo $title;
    ?>
</title>

</head>

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
				<time class="art-time"></time>
				<h2 class="art-title"><?php echo $title ?></h2>
				<p class="art-subtitle"></p>
			</div>
		</header>

		<div class="art-body">
			<div class="art-body-inner">
				<hr class="featured-article" />
				<?php
					echo '<p>'.$content.'</p>';
				?>

				<hr />

				<h2>Komentar</h2>

				<div id="contact-area">
					<form name="submission" method="post" onsubmit="addcomment();return false;">
						<label for="Nama">Nama:</label>
						<input type="text" name="Nama" id="Nama" placeholder="ex: Riva Syafri Rachmatullah">

						<label for="Email">Email:</label>
						<input type="text" name="Email" id="Email" placeholder="ex: riva.syafri.r@gmail.com">

						<label for="Komentar">Komentar:</label><br>
						<textarea name="Komentar" rows="20" cols="20" id="Komentar"><?php echo $comment;?></textarea>

						<input type="submit" name="submit" value="Kirim" class="submit-button" onclick="return validateemail()">
					</form>
				</div>

				<div id="myDiv">
					<ul class="art-list-body">
						<?php
							$result = mysqli_query($con, "SELECT * FROM comment_table WHERE id_post=$id ORDER BY time ASC");
							while ($row = mysqli_fetch_array($result)) {
								echo '<li class="art-list-item">';
								echo '<div class="art-list-item-title-and-time">';
								echo '<h2 class="art-list-title"><a>'.$row["name"].'</a></h2>';
								echo '<div class="art-list-time">'.$row["time"].'</div>';
								echo '</div>';
								echo '<p>'.$row["content"].'</p>';
								echo '</li>';
							}
						?>
					</ul>
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

	<?php
		mysqli_close($con);
	?>
	<script type="text/javascript">
		function validateemail() {
			var email = document.forms["submission"]["Email"].value;
			var regex = \b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b;
			var checker = email.match(regex);
			if (checker == null) {
				alert("Format email yang dimasukkan salah!");
				document.getElementById("Email").focus();
				return false;
			}
		}
	</script>
	<script type="text/javascript">
		function addcomment() {
			var name = document.forms["submission"]["Nama"].value;
			var email = document.forms["submission"]["Email"].value;
			var content = document.forms["submission"]["Komentar"].value;
			var xmlhttp;
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("myDiv").innerHTML=document.getElementById("myDiv").innerHTML+xmlhttp.responseText;
				}
			}
			var string= "id=<?php echo $id; ?>&name=" + name + "&email=" + email + "&content=" + content;
			xmlhttp.open("GET","addcomment.php?"+string,true);
			xmlhttp.send();
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
