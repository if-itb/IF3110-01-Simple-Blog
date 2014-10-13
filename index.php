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
<div class="wrapper">

<nav class="nav">
    <a name="top"></a>
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
				include('connectdb.php');
				$query = mysql_query("SELECT * FROM post order by tanggal desc") or die (mysql_error());
				if(mysql_num_rows($query) > 0){
					while($row = mysql_fetch_assoc($query)){
						$pid = $row['pid'];
						$judul = $row['judul'];
						$tanggal = $row['tanggal'];
						$konten = $row['konten'];
						echo "<li class=\"art-list-item\">
								<div class=\"art-list-item-title-and-time\">
									<h2 class=\"art-list-title\"><a href=\"viewpost.php?pid=$pid\">".$judul."</a></h2>
									<div class=\"art-list-time\">".$tanggal."</div>
									<div class=\"art-list-time\"><span style=\"color:#F40034;\">&#10029;</span> Featured</div>
								</div>";
								$string = strip_tags($konten);
								if (strlen($string) > 200) {

									// truncate string
									$stringCut = substr($string, 0, 200);

									// make sure it ends in a word so assassinate doesn't become ass...
									$string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
									echo $string."... <a href=\"viewpost.php?pid=$pid\">Read More</a><br>";
								}
								else{
									echo $string;
								}
								echo "<br>
								<a href=\"editpost.php?pid=$pid\">Edit</a> | <a href=\"deletepost.php?pid=$pid\" onclick=\"return deletebox();\">Hapus</a>
								</li>";
					}
				}
				else{
					echo "<p>THERE IS NO POST YET</p>";
				}
			?>
          </ul>
        </nav>
    </div>
</div>

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
<script type="text/javascript" src="deleteconfirmation.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>