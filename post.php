<?php
    include_once('resources/init.php');
    $posts = (isset($_GET['id'])) ? show_post($_GET['id']) : show_post();
    foreach($posts as $post){

    }
    $comments = (isset($_GET['id'])) ? get_comments($_GET['id']) : get_comments();
    if(isset($_POST['Nama'],$_POST['Email'],$_POST['Komentar'],$_GET['id'])){
        $postid=(int)($_GET['id']);
        $errors=array();
        $nama = trim($_POST['Nama']);
        $email = trim($_POST['Email']);
        $isi = trim($_POST['Komentar']);

        if(empty($nama)){
            $errors[]="Nama tidak boleh kosong";
        }
        if(empty($email)){
            $errors[]="Email tidak boleh kosong";
        }
        if(empty($isi)){
            $errors[]="Komentar tidak boleh kosong";
        }
        if(empty($errors)){
            add_comment($postid,$nama,$email,$isi);
            //$header="Location : post.php?id='{$postid}'";
            //header('Location : post.php');
            //die();
        }

    }
?>

<script type=text/javascript>
    function validateEmail() { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var email = document.getElementsByName('Email')[0].value;
    if(re.test(email)){
        return true;
    }
    else{
        alert("Format e-mail tidak benar");
        return false;
    }
}
</script>

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

<title>Simple Blog | <?php echo $post['judul'];?></title>


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
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time">15 Juli 2014</time>
            <h2 class="art-title"><?php echo $post['judul'];?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
                <p><?php echo $post['konten'];?></p>
            <hr />
            
            <h2>Komentar</h2>

            <?php 
                if (isset($errors) && !empty($errors)){
                    echo '<ul><li>', implode ('</li><li>',$errors), '</li></ul>';
                }

            ?>

            <div id="contact-area">
                <form method="post" action="#">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" onclick="return validateEmail();" value="comment.php?id=<?php echo $post['id'];?>" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body">
                <?php foreach($comments as $comment){
                    ?>
                
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php?id=<?php echo $comment['post_id'];?>"><?php echo $comment['nama'];?></a></h2>
                        <div class="art-list-time"><?php echo $comment['tanggal']?></div>
                    </div>
                    <p><?php echo $comment['isi'];?> &hellip;</p>
                </li>

                <?php
                    }
                ?>
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