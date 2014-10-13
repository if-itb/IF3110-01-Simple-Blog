<?php
	$bulan=array("Januari","Februari","Maret","April","May","Juni","Juli","Agustus","September","Oktober","November","Desember");
?>
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
    <a style="border:none;" id="logo" href="index.php"><h1>Riady's Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>


<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
			<?php
				mysql_connect("localhost","root","");
				@mysql_select_db("simpleblog") or die( "Unable to select database");
				$query = "SELECT * FROM post";
				$result = mysql_query($query);
				$jumpost = mysql_numrows($result);
				for($i = 0 ; $i < $jumpost ; $i++){
			?>
					<li class="art-list-item">
						<div class="art-list-item-title-and-time">
							<h2 class="art-list-title"><a href="post.php?postid=<?php echo mysql_result($result,$i,"idpost");?>">
							<?php
								$judul = mysql_result($result,$i,"judul");
								if(strlen($judul)<=15){
									echo htmlentities($judul);
								}
								else{
									echo htmlentities(substr($judul,0,15))."...";
								}
							?>
							</a></h2>
							<div class="art-list-time">
							<?php
								$tanggal = mysql_result($result,$i,"tanggal");
								$tgl = substr($tanggal,8,2);
								$bln = substr($tanggal,5,2);
								$tahun = substr($tanggal,0,4);
								echo $tgl." ".$bulan[$bln-1]." ".$tahun;
							?>
							</div>
							<div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div>
						</div>
						<p>
							<?php
								$konten = mysql_result($result,$i,"konten");
								if(strlen($konten)<=100){
									echo htmlentities($konten);
								}
								else{
									echo htmlentities(substr($konten,0,100));
									echo '...<br><a href ="post.php?postid='.mysql_result($result,$i,"idpost").'">See more</a>';
								}
							?>
						</p>
						<p>
						<a href="
							<?php
								$pid = mysql_result($result,$i,"idpost");
								echo "edit_post.php?postid=".$pid;
							?>
						">Edit</a> | <a href="" onclick="confirmfunction<?php echo $pid;?>()">Hapus</a>
						</p>
						<?php
							echo '<script>
								function confirmfunction'.$pid.'(){
									if(confirm("Apakah Anda yakin menghapus post ini?")){
										window.location="delete_post.php?pid='.$pid.'";
									}
								}
							</script>
							';
						?>
					</li>
				<?php
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
		Riady 13512024
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
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