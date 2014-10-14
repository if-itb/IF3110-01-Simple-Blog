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

<title>Simple Blog | Apa itu Simple Blog?</title>

<script type="text/javascript">

function cekData(){
    if(new_comment.Nama.value == ""){
        alert("Nama harus diisi!");
        return false;
    }
    else if(new_comment.Email.value == ""){
        alert("E-mail harus diisi!");
        return false;
    }
    else if(new_comment.Komentar.value == ""){
        alert("Komentar post harus diisi!");
        return false;
    }
    else{
        checkEmail();
        showComment();
        return false;
    }
}

function checkEmail(){
    var validformat=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!validformat.test(new_comment.Email.value)){
        alert("Email anda salah!");
    }
}

function showComment() {
    var nama = document.getElementById('Nama').value;
    var email = document.getElementById('Email').value;
    var komentar = document.getElementById('Komentar').value;
    var post_id = document.getElementById('post_id').value;
    var comment_date = document.getElementById('comment_date').value;
    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
       xmlhttp=new XMLHttpRequest();
    } 
    else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("listKomentar").innerHTML=xmlhttp.responseText + document.getElementById("listKomentar").innerHTML;
        }
    }
    xmlhttp.open("POST","new_comment.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("&post_id="+post_id+"&Nama="+nama+"&Email="+email+"&Komentar="+komentar+"&comment_date="+comment_date+"&post_id="+post_id);
}

</script>

</script>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<?php
  $session_post_id = $_GET['pc'];
  // Create connection
  $con=mysqli_connect("localhost","root","","wbd_db");
  $result = mysqli_query($con,"SELECT * FROM post WHERE post_id = '$session_post_id'");
  $row = mysqli_fetch_array($result);
?>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $row['post_date']?></time>
            <h2 class="art-title"><?php echo $row['tittle']?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>
    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $row['konten']?></p>

            <hr />

        <?php mysqli_close($con); 
            $session_post_id = $_GET['pc'];
        ?>

            <h2>Komentar</h2>

            <div id="contact-area">
                <form name="new_comment" method="post" onsubmit="cekData(); return false;">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                    <input type="hidden" name="post_id" id="post_id" value="<?php echo $row['post_id']?>">
                    <input type="hidden" name="comment_date" id="comment_date" value="<?php echo "".date("Y-m-d") ?>">
                </form>
            </div> 
            <ul class="art-list-body" id="listKomentar">
                <?php 
                    // Create connection
                    $con=mysqli_connect("localhost","root","","wbd_db");
                    $result = mysqli_query($con,"SELECT * FROM comment WHERE post_id = '$session_post_id' ORDER BY comment_id DESC");
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php"><?php echo $row['nama'] ?></a></h2>
                        <div class="art-list-time"><?php echo $row['comment_date'] ?></div>
                    </div>
                    <p><?php echo $row['komentar'] ?> &hellip;</p>
                </li>
                <?php 
                }
                mysqli_close($con); 
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