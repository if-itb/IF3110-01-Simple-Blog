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
</head>
<body class="default">
<div class="wrapper">
<?php
    include 'mysql.php';
    $PID = $_GET['id'];
    $result = mysql_safe_query("SELECT * FROM post WHERE id='$PID' LIMIT 1");

    if(!mysql_num_rows($result)) {
    echo 'Post #'.$PID.' not found';
    exit;
    }
    else{
    while
    ($row = mysql_fetch_assoc($result)){
    echo '<title>Simple Blog | '.$row['title'].'</title>
    <nav class="nav">
		<a style="border:none;" id="logo" href="index.html"><h1>Simple<span>-</span>Blog</h1></a>
		<ul class="nav-primary">
			<li><a href="new_post.php">+ Tambah Post</a></li>
		</ul>
	</nav>

	<article class="art simple post">

		<header class="art-header">
			<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
				<time class="art-time">'.$row['date'].'</time>
				<h2 class="art-title">'.$row['title'].'</h2>
				<p class="art-subtitle"></p>
			</div>
		</header>

		<div class="art-body">
			<div class="art-body-inner">
				<hr class="featured-article" />
				<p>'.$row['content'].'</p>';
    }
}
echo '<hr />';
echo '<h2>Komentar</h2>';
echo '<div id="contact-area">
                <form method="post" action="#">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">

                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">

                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>';
$result = mysql_safe_query('SELECT * FROM comment WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
while($row = mysql_fetch_assoc($result)) {
echo '<ul class="art-list-body">
          <li class="art-list-item">
              <div class="art-list-item-title-and-time">
                   <h2 class="art-list-title"><a href="post.html">'.$row['name']</a></h2>
                   <div class="art-list-time">'.$row['date'].'</div>
                   </div>
                   <p>'.$row['content'].'</p>
           </li>
            </ul>
        </div>
    </div>';
?>

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

</body>
</html>
