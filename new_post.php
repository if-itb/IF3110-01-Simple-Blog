<?php

if (isset($_POST['judul'], $_POST['tanggal'], $_POST['konten']))
{
    $errors = array();

    $judul = trim($_POST['judul']);
    $tanggal = trim($_POST['tanggal']);
    $konten = trim($_POST['konten']);

    if (empty($judul)) {
        $errors[] = "Masukkan judul.";
    }

    if (empty($tanggal)) {
        $errors = "Masukkan tanggal.";
    }

    if (empty($konten)) {
        $errors = "Masukkan konten.";
    }

    if (strlen($judul)>255) {
        $errors = "Judul terlalu panjang.";
    }

    if (empty($errors)) {
        include 'connect.php';


        $judul = mysql_real_escape_string($judul);
        $tanggal = mysql_real_escape_string($tanggal);
        $konten = mysql_real_escape_string($konten);
        $Pid = mysql_insert_id();

        mysql_query("INSERT INTO post SET
                        'Pid' = {$Pid},
                        'judul' = '{$judul}',
                        'konten' = '{$konten}',
                        'tanggal' = NOW()
                    ");

        
        header('Location: index.php?id={$Pid}');
        die();
    }
}

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

<title>Simple Blog | Tambah Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>
           

            <div id="contact-area">
                <form method="post" action=" ">
                    <div>
                        <label for="judul">Judul:</label>
                        <input type="text" name="judul" value='<?php if(isset($_POST['judul'])){ echo $_POST['judul'];}?>'>
                    </div>
                    <div>
                        <label for="tanggal">Tanggal:</label>
                        <input type="text" name="tanggal" value='<?php if(isset($_POST['tanggal'])){ echo $_POST['tanggal'];}?>'>
                    </div>
                    <div>
                        <label for="konten">Konten:</label><br>
                        <textarea name="konten" rows="20" cols="20"><?php if(isset($_POST['konten'])){ echo $_POST['konten'];}?></textarea>
                    </div>
                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>

                <?php
                if(isset($_POST['submit']))
                {
                    $_POST = array_map('stripslashes',$_POST);

                    extract($_POST);

                    if($judul == '')
                    {
                        $error[] = 'Silakan masukkan judul.';
                    }

                    if($konten == '')
                    {
                        $error[] = 'Silakan masukkan konten.';
                    }

                    if($tanggal == '')
                    {
                        $error[] = 'Silakan masukkan tanggal.';
                    }
                }

                if(!isset($error))
                {
                    mysql_connect('localhost','root','');
                    mysql_select_db('simpleblog');


                    $sql = "INSERT INTO post (judul,tanggal,konten) VALUES ($judul,$tanggal,$konten)";
                    $result = mysql_query($sql) or print("Post tidak bisa ditambahkan.<br />".$sql."<br />".mysql_error());

                    if ($result!=false) {
                        print "Post berhasil ditambahkan.";
                    }

                    mysql_close();
                }

                if(isset($error))
                {
                    foreach($error as $error)
                    {
                        echo '<p class="error">'.$error.'</p>';
                    }
                }

                ?>

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