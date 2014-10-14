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

<title>Azaky Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
		<a style="border:none;" id="logo" href="index.php"><h1>Azaky<span>-</span>Blog</h1></a>
		<ul class="nav-primary">
				<li><a href="new_post.php">+ Tambah Post</a></li>
		</ul>
</nav>

<div id="home">
		<div class="posts">
				<nav class="art-list">
					<ul class="art-list-body">
<?php
	require_once(dirname(__FILE__).'/db_controller.php');

	$db = new DB();
	$allPosts = $db->getAllPosts();
	if (count($allPosts) == 0) {
?>
						<li class="art-list-item">
								<div class="art-list-item-title-and-time">
										<h2 class="art-list-title">Belum ada post.<br></h2><a href="new_post.php">+ Tambah Baru</a>
								</div>
						</li>
<?php
		
	}
	else {
		foreach ($allPosts as $post) {
?>
						<li class="art-list-item">
								<div class="art-list-item-title-and-time">
										<h2 class="art-list-title"><a href="post.php?id=<?php echo $post["id"]; ?>"><?php if (strlen($post["judul"]) > 25) {
											echo htmlentities(substr($post["judul"], 0, 25)) . " ...";
										}
										else {
											echo htmlentities($post["judul"]);
										} ?></a></h2>
										<div class="art-list-time"><?php echo $post["tanggal"]; ?></div>
										<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
								</div>
								<div class="art-list-body"><p><?php if (strlen($post["konten"]) > 255) {
									echo htmlentities(substr($post["konten"], 0, 255)) . ' <a href="post.php?id=' . $post["id"] . '">... See More</a>';
								} else {
									echo htmlentities($post["konten"]); 
								} ?></p>
								<p>
									<a href="edit_post.php?id=<?php echo $post["id"]; ?>">Edit</a> | <a href="javascript:removePost(<?php echo $post["id"]; ?>)">Hapus</a>
								</p>
								</div>
						</li>
<?php
		}
	}
?> 
					</ul>
				</nav>
		</div>
</div>

<footer class="footer">
		<div class="back-to-top"><a href="#">Back to top</a></div>
		<div class="psi">&Psi;</div>
		<aside class="offsite-links">
			Ahmad Zaky | <a href="mailto:13512076@std.stei.itb.ac.id">13512076</a></br>
			<a class="twitter-link" href="http://github.com/azaky">GitHub</a>
		</aside>
</footer>

</div>

<script>
	removePost = function(id) {
		var response = confirm("Apakah Anda yakin menghapus post ini?");
		if (response) {
			window.location = "delete_post.php?id=" + id;
		}
	}
</script>

</body>
</html>