<!-- Ananda Kurniawan /13511052--> 

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
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<?php
  include("config.php");
  $query = "SELECT * FROM post ORDER BY tanggal DESC";
  $result = mysql_query($query);
  $title = "Simple Blog";
?>


<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <?php
            if (mysql_num_rows($result) == 0) {
              echo "<p>Tidak ada post yang disimpan</p>";
            } else {
               while($row = mysql_fetch_assoc($result)) {
                $id = $row['id'];
                $judul = $row['judul'];
                $tanggal = $row['tanggal'];
                $konten = $row['konten'];
              ?>
              <li class="art-list-item">
                  <div class="art-list-item-title-and-time">
                      <h2 class="art-list-title"><a href="view_post.php?id=<?php echo $id;?>"><?php echo $judul;?></a></h2>
                      <div class="art-list-time"><?php echo printTanggal($tanggal);?></div>
                      <!-- <div class="art-list-time"><span style="color:#F40034;">&#10029;</span> Featured</div> -->
                  </div>
                  <p><?php echo $konten;?></p>
                  <p>
                    <a href="edit_post.php?id=<?php echo $id;?>">Edit</a> | <a href="javascript:void(0)" onclick="deleteConfirm(<?php echo $id;?>)">Hapus</a>
                  </p>
              </li>
            <?php }
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

<!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script> -->
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript" src="assets/js/simple_blog.js"></script>
<?php 
if(isset($isLoadComments)) {
  if($isLoadComments) { ?>
<script type="text/javascript">
  window.onload = loadComments();
</script>
<?php 
  }
} ?>

<?php
function printTanggal($date) {
	$splittedDate = explode("-", $date);
	$num_month = $splittedDate[1];
	$date = $splittedDate[2];
	$year = $splittedDate[0];

	switch ($num_month) {
				case "01": 
						$month = "Januari";
						break;
				case "02": 
						$month = "Februari"; 
						break;
				case "03": 
						$month = "Maret"; 
						break;
				case "04": 
						$month = "April"; 
						break;
				case "05": 
						$month = "Mei"; 
						break;
				case "06": 
						$month = "Juni"; 
						break;
				case "07": 
						$month = "Juli"; 
						break;
				case "08": 
						$month = "Agustus"; 
						break;
				case "09": 
						$month = "September"; 
						break;
				case "10": 
						$month = "Oktober"; 
						break;
				case "11": 
						$month = "November"; 
						break;
				case "12": 
						$month = "Desember"; 
						break;
				default: break;
	}

	return $date." ".$month." ".$year;  
}

?> 

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