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

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
} else {
    $id = $_GET["id"];
}

include("config.php");

$query = "SELECT * FROM post WHERE id='".$id."'";
$result = mysql_query($query);

if (mysql_num_rows($result) == 0) {
    header("Location: index.php");
} else {
    $isPostExist = true;
    $post = mysql_fetch_array($result);
}


$title = "Simple Blog | " . $post['judul'];

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



<article class="art simple post">

    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo printTanggal($post['tanggal']); ?></time>
            <h2 class="art-title"><?php echo $post['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <!-- <hr class="featured-article" /> -->
            <p><?php echo $post['konten']; ?></p>
            

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="#" onsubmit="return addComment()">
                    <input type="hidden" id="id_post" name="id_post" value="<?php echo $post['id']; ?>" >
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
                    <span id="namaerror" class=""></span><br>

                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    <span id="emailerror" class=""></span><br>

                    <label for="Komentar">Komentar:</label>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
                    <span id="komentarerror" class=""></span><br>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id="comments-area">
                
            </ul>
        </div>
    </div>


</article>



<?php 
$isLoadComments = true;
?>
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