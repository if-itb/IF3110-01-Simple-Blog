<?php
  include('config.php');

    $id = $_GET['id'];

    $query = mysql_query("SELECT  `judul`, `tanggal`, `konten` FROM `data-post` WHERE `post-id`=$id") or die(mysql_error());
 
    $data = mysql_fetch_array($query);
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

<script language="javascript" type="text/javascript">

function buatAjax() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
var drz = buatAjax();

function kirimData() {
    var komen = "id="+<?php echo $id; ?>;
        komen += "&nama="+document.formKomen.Nama.value;
        komen += "&email="+document.formKomen.Email.value;
        komen += "&komentar="+document.formKomen.Komentar.value; 
    drz.onreadystatechange = function() {
        if((drz.readyState == 4) && (drz.status == 200)) {
            var text = drz.responseText + document.getElementById("proses").innerHTML;
            document.getElementById("proses").innerHTML = text;
            document.formKomen.Nama.value = "";
            document.formKomen.Email.value = "";
            document.formKomen.Komentar.value = "";
        }
    }
    drz.open("POST", "insert_komentar.php?data="+Math.random(), true);
    drz.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    drz.setRequestHeader("Content-length", komen.length);
    drz.setRequestHeader("Connection", "close");
    drz.send(komen);
}

</script>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Apa itu Simple Blog?</title>


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
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1; position: relative">
            <time class="art-time"><?php echo $data['tanggal']; ?></time>
            <h2 class="art-title"><?php echo $data['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $data['konten']; ?></p>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" name="formKomen">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="button" name="submit" value="Kirim" class="submit-button" onClick="validasiEmail(document.formKomen.Email)">
                </form>
            </div>

            <ul class="art-list-body">
            <div id="proses"></div>
            <?php
                $query_komen = mysql_query("SELECT `kom-id`, `nama`, `waktu`, `email`, `komentar` FROM `data-kom` WHERE `post-id`=$id ORDER BY `kom-id` DESC");
                while ($data_kom=mysql_fetch_array($query_komen)) {
            ?>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="mailto:<?php echo $data_kom['email']; ?>"><?php echo $data_kom['nama']; ?></a></h2>
                        <div class="art-list-time"><?php echo $data_kom['waktu']; ?></div>
                    </div>
                    <p><?php echo $data_kom['komentar'] ?></p>
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
<script>
function validasiEmail(inputText) { 
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    if(inputText.value.match(mailformat))  
    {  
        kirimData(); 
    }  
    else  
    {  
        alert("Masukan email tidak valid!");  
        document.formKomen.Email.focus();  
    }  
} 
</script>
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