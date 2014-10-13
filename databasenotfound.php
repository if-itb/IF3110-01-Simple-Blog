<?php include 'functions.php'; 
  include_once('sb-config.php');
  $GLOBALS['condb']=@mysqli_connect($config['host'],$config['username'],$config['password'],$config['dbname']);
  
  // Check connection
  if (mysqli_connect_errno()) {
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

<title>Jeffrey Lingga's Blog | Database Not Found</title>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Jeffrey<span>-</span>Lingga</h1></a>
    <ul class="nav-primary">
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <br><h3>Database tidak dapat diakses</h3>
          Mohon ikuti langkah-langkah berikut untuk menggunakan blog ini :<br>
          <ol>
            <li>Pastikan sudah memiliki "if3110_simple_blog_db.sql", seharusnya sudah ada di folder yang sama dengan file ini. jika tidak ada download <a href="https://www.dropbox.com/s/h8cjj7hfcm34upx/if3110_simple_blog_db.sql?dl=1">di sini</a></li>
            <li>Lakukan import "if3110_simple_blog_db.sql" ke dalam MySQL anda</li>
            <li>Jika tetap tidak bisa, silakan buka file konfigurasi "sb-config.php" menggunakan text editor apapun, sesuaikan isi field-field variabel di file tersebut<br>
              $config['host'] = isilah alamat host anda dalam tanda kutip satu, biasanya 'localhost';<br>
              $config['username'] = isilah dengan nama user (dalam tanda kutip satu) yang memiliki privilage terhadap database "if3110_simple_blog_db.sql", biasanya 'root';<br>
              $config['password'] = isilah dengan password user tadi dalam kutip satu, bila tidak mengeset password masukkan '';<br>
              $config['dbname'] = 'if3110_simple_blog_db';<br>
            </li>
            <li>Jika masih terkendala dalam instalasi, silakan hubungi <a href="http://facebook.com/jeffreylingga">Jeffrey Lingga Binangkit</a>
          </ol>
          <br>
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

<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>
<br>
</body>
</html>
<?php }
else{
  header('Location: index.php');
  die();  
}
?>