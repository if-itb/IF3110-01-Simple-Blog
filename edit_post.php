<?php
include_once('resources/init.php');

if(isset($_POST['Judul'],$_POST['Tanggal'],$_POST['Konten'])){
    $errors = array();
    $Judul = trim($_POST['Judul']);
    $Tanggal = trim($_POST['Tanggal']);
    $Konten = trim($_POST['Konten']);
    $now = date('Y-m-d');
    $now = strtotime($now);

    if(empty($Judul)){
        $errors[]='Judul tidak boleh kosong';
    }
    elseif(strlen($Judul)>24){
    	$errors[]='Judul terlalu panjang (24 character)';
    }
    if(empty($Tanggal)){
    	$errors[]='Tanggal tidak boleh kosong';
    }

    if(empty($Konten)){
        $errors[]='Konten tidak boleh kosong';
    }
    
    $NTanggal = strtotime($Tanggal);
    $Tanggal = date('Y-m-d',$NTanggal);

    if($NTanggal<$now){
        $errors[]='Tanggal Tidak Sesuai';
    }

    if(empty($errors)){
        edit_post($Judul,$Tanggal,$Konten,$_GET['id']);
    }
}

$posts = (isset($_GET['id'])) ? show_post($_GET['id']) : show_post();
    foreach($posts as $post){

    }
?>

<!DOCTYPE HTML>
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

<title>Simple Blog | Edit Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Edit Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
            <li class="art-list-item">          
                <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.php?id=<?php echo $post['id'];?>"><?php echo $post['judul']; ?></a></h2>
                    <div class="art-list-time"><?php echo $post['tanggal']; ?></div>
                </div>
                <p><?php echo $post['konten']; ?> &hellip;</p>                         
              </li>
            </ul>
        </nav>
    </div>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>

            <?php 
                if (isset($errors) && !empty($errors)){
                    echo '<ul><li>', implode ('</li><li>',$errors), '</li></ul>';
                }

            ?>

            <div id="contact-area">
                <form method="post" action="#">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten">
                        
                    </textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
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