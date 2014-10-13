<?php
	require "db.php";
  if (!isset($_GET['id'])){
    throw new Exception("Missing parameter: id");
  }
	$post = getPost($_GET['id']);
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

<title>Simple Blog | <?=$post['title'];?></title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.html"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="edit_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?=$post['tanggal'];?></time>
            <h2 class="art-title"><?=$post['judul'];?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?=post['konten'];?></p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
              <div id="error-message">
              </div>
                <form method="post" action="#">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>

            </div>

            <ul class="art-list-body" id='comments'>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.html">Jems</a></h2>
                        <div class="art-list-time">2 menit lalu</div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                </li>
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
<script type="text/javascript">
  function getComments(post_id){
    http = new XMLHttpRequest();
    http.open("GET","comment.php",true);

    http.onreadystatechange = function(){
      if (http.readyState == 4 && http.status == 200){
        var response = JSON.parse(http.responseText);
        if (response.status == 'valid'){
          var dom = document.getElementById('comments');
          for (var i in response.content){
            dom.appendChild(makeComment(response.content[i].nama,response.content[i].tanggal,response.content[i].komentar));
          }
        } else {
          var dom = document.getElementById("error-message");
          dom.innerHtml = "<p> Error : "+response.content;
        }
      }
    }
  }
  function addComment(post_id){
    if (confirm("Apakah Anda yakin menghapus post ini?")){
      xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST","delete.php",true);
      var params = JSON.stringify({"id" : id});

      xmlhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
      xmlhttp.setRequestHeader("Content-length", params.length);
      xmlhttp.setRequestHeader("Connection", "close");

      xmlhttp.onreadystatechange = function (){
        if (xml.readyState == 4 && xmlhttp.status == 200){
          document.getElementById(""+id).style.visible = "none";
        }
      }
    }
  }

  function makeComment(nama,tanggal,komentar){
    return "<ul class='art-list-body'>
                <li class='art-list-item'>
                    <div class='art-list-item-title-and-time'>
                        <h2 class='art-list-title'><a href='index.php'>"+nama+"</a></h2>
                        <div class='art-list-time'>"+tanggal+"</div>
                    </div>
                    <p>"+komentar+"</p>
                </li>
            </ul>";

  }
</script>
</body>
</html>