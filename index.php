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

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php
				require_once __DIR__ . '/connect_db.php';	
				$db = new connect_db();
				$result = mysql_query("SELECT * FROM simple_post ORDER BY pid DESC") or die(mysql_error());
				
				while($post = mysql_fetch_array($result)){
					echo '<li class="art-list-item">';
						echo '<div class="art-list-item-title-and-time">';
							echo '<h2 class="art-list-title">';
								echo '<a href="post.php?id=' . $post['pid'] .'">';
									echo $post['judul'];
								echo '</a>';
							echo '</h2>';
							echo '<div class="art-list-time">';
								echo ($post['tanggal']);
							echo '</div>';
						echo '</div>';
						echo '<p>';
						if(strlen($post['konten']) > 300)
						{
							echo substr($post['konten'], 0, 299);
							echo '<br />...<br /><a href="post.php?id=' . $post['pid'] .'">';
								echo 'Continue Reading';
							echo '</a>';
						}else{
							echo $post['konten'];
						}
						echo '<br />';
							echo '<a href="edit_post.php?id=' . $post['pid'] . '">Edit</a> | <a href="delete_post.php?id=' . $post['pid'] . '" onclick="return confirm(\'Apakah Anda yakin menghapus post ini?\');">Hapus</a>';
						echo '</p>';
					echo '</li>';
				}
			?>
          </ul>
        </nav>
    </div>
</div>

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