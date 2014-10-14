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
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php
	require_once __DIR__ . '/connect_db.php';	
	$id = $_GET["id"];
	$db = new connect_db();
	$result = mysql_query("SELECT * FROM simple_post WHERE pid=$id") or die(mysql_error());
	$post = mysql_fetch_array($result);
	$comments = mysql_query("SELECT * FROM simple_komen WHERE kid=$id") or die(mysql_error());
?>

<title>Simple Blog | <?php echo($post['judul']); ?> </title>

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
		<div class="art-header-inner" style="margin-top: 0px; opacity:1;">
			<time class="art-time"><?php echo($post['tanggal']); ?></time>
			<h2 class="art-title"><?php echo($post['judul']); ?></h2>
			<p class="art-subtitle"></p>
		</div>
	</header>
	
	<div class="art-body">
		<div class="art-body-inner">
			<p><?php echo($post['konten']); ?></p>
			<hr />

			<h2>Komentar</h2>

			<div id="contact-area">
				<form autocomplete="off" method="post" action="do_komen.php" >
					<input type="hidden" name="post_id" id="Post_Id" value=<?php echo($_GET['id']); ?>>
					
					<label for="name">Nama:</label>
					<input type="text" name="name" id="Nama" placeholder="Your name" required>

					<label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" placeholder="name@mail.com" pattern="[a-zA-Z0-9_\.\+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-\.]+" required>

					<label for="comments">Komentar:</label><br>
					<textarea name="comments" rows="20" cols="20" id="Komentar" required></textarea>
					
					<input type="hidden" name="Tanggal" id="Tanggal" value="<?php echo date("Y-m-d"); ?>">

					<input type="submit" name="submit" value="Kirim" class="submit-button">
				</form>
			</div>

			<ul class="art-list-body">
                <?php
				while($komen = mysql_fetch_array($comments))
				{
					echo '<li class="art-list-item">';
						echo '<div class="art-list-item-title-and-time">';
							echo '<h2 class="art-list-title">';
								echo '<a href="#">';
									echo $komen['nama'];
								echo '</a>';
							echo '</h2>';
							echo '<div class="art-list-time">';
								echo 'posted at <br />' . $komen['tanggal'] . " " ;
							echo '</div>';
						echo '</div>';
						echo '<p>';
						echo $komen['komen'];
						echo '</p>';
					echo '</li>';
				}
				?>
            </ul>
		</div>
	</div>
	
</article>

<?php include("footer.php"); ?>

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

</body>
</html>