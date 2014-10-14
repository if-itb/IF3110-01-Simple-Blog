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
	include 'mysql.php';
	$id = $_GET['id'];
	date_default_timezone_set('Asia/Jakarta');
	$result = mysql_safe_query('SELECT * FROM posts WHERE id=%s LIMIT 1', $_GET['id']);

	if(!mysql_num_rows($result)) {
		echo 'Post #'.$_GET['id'].' not found';
		exit;
	}
	
	$row = mysql_fetch_assoc($result);
?>

<title>Simple Blog | <?php echo $row['title'];?></title>
<script type="text/javascript" src="assets/js/comment.js"></script>

</head>

<body class="default" onload="javascript:showComment(<?php echo $id;?>)">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post" >
    <div class="art-body">
        <div class="art-body-inner">
			<br><br><br><br><br>
			<?php 
				echo '<h2><center>'.$row['title'].'</h2>';
				echo '<em><center>Posted '.date($row['date']).'</center></em>';
			?>
			<br>
				<hr class="featured-article"/><br>
				<?php
					echo $row['body'];
				?>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
				<form method="post" id="comment-form" action="javascript:addComment(<?php echo $id;?>)">
					<table>
						<tr>
							<td><label for="name">Name:</label></td>
							<td><input name="name" id="name"></td>
						</tr>
						<tr>
							<td><label for="email">Email:</label></td>
							<td><input name="email" id="email"></td>
						</tr>
							<td><label for="content">Comments:</label></td>
							<td><textarea name="content" id="content"></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="submit" class="submit-button"></td>
						</tr>
					</table>
				</form>
            </div>
			
			<ul class="art-list-body" id="comment">
				<! filled later>
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

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>