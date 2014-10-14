<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="IF3110-Simple Blog" content="Deskripsi Blog">
<meta name="Tony" content="Judul Blog">

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


<script>
	function deletePost(delID)
	{
		var confDialog = confirm("Are you sure want to delete this post?");
		if (confDialog)
		{
			window.location = 'index.php?delete=' + delID; 
		}
	}
</script>

<?php
	include ("mysql.php");
	if (isset($_GET['delete']))
	{
		mysql_safe_query("DELETE FROM post WHERE id = $_GET[delete]");
	}
	$query = mysql_safe_query('SELECT * FROM post');
?>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="#"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
			<?php
				while ($data = mysql_fetch_row($query))
				{
					echo  '<li class="art-list-item">
							<div class="art-list-item-title-and-time">
								<h2 class="art-list-title"><a href="post.php?id='.$data[0].'">'.$data[1].'</a></h2>
								<div class="art-list-time">'.$data[3].'</div>
							</div>
							<p>';
							
					$contentText = explode(' ',$data[2]);
					$i = 0;
					while ($i < 15 && $i < count($contentText))
					{
						echo $contentText[$i].' ';
						$i++;
					}
					if (count($contentText) > 15)
					{
						echo '&hellip;';
					}
					
					echo '</p>
							<p>
							  <a href="edit_post.php?id='.$data[0].'">Edit</a> | <a href="javascript:void(0);" onclick ="deletePost('.$data[0].');">Hapus</a>
							</p>
						</li>';
				}
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

</body>
</html>