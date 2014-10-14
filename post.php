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


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
<?php    

include "db-connector.php";
$iPost = $_GET['iPost'];

$query_getPost = "SELECT * FROM post_content WHERE id=$iPost";
$hasil_getPost = mysql_query($query_getPost, $db) or die(mysql_error());


    echo '<header class="art-header">';
        echo '<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">';
            echo '<time class="art-time">';
                $query_getPost = "SELECT * FROM post_content WHERE id=$iPost";
                $hasil_getPost = mysql_query($query_getPost, $db) or die(mysql_error());
                while ($data = mysql_fetch_assoc($hasil_getPost)){
                    echo $data['date'];
                }
            echo '</time>';
            echo '<h2 class="art-title">';
                $query_getPost = "SELECT * FROM post_content WHERE id=$iPost";
                $hasil_getPost = mysql_query($query_getPost, $db) or die(mysql_error());
                while ($data = mysql_fetch_assoc($hasil_getPost)){
                    echo $data['title'];
                }
            echo '</h2>';
            echo '<p class="art-subtitle"></p>';
        echo '</div>';
    echo '</header>';

    echo '<div class="art-body">';
        echo '<div class="art-body-inner">';
            echo '<hr class="featured-article" />';
                echo '<p>';
                $query_getPost = "SELECT * FROM post_content WHERE id=$iPost";
                $hasil_getPost = mysql_query($query_getPost, $db) or die(mysql_error());
                while ($data = mysql_fetch_assoc($hasil_getPost)){
                    echo $data['content'];
                }
                echo '</p>';
            echo '<hr />';
            
            echo '<h2>Komentar</h2>';

            echo '<div id="contact-area">';
                echo '<form name="formkomen" method="post" ;">';
                    echo '<label for="Nama">Nama:</label>';
                    echo '<input type="text" name="Nama" id="Nama" >';
        
                    echo '<label for="Email">Email:</label>';
                    echo '<input type="text" name="Email" id="Email">';
                    
                    echo '<label for="Komentar">Komentar:</label><br>';
                    echo '<textarea name="Komentar" rows="20" cols="20" id="Komentar" ></textarea>';

                    echo '<input type="button" name="submit" value="Kirim" class="submit-button" onclick="validateEmail()";>';
                echo '</form>';
            echo '</div>';

        $query_getAll = "select * from post_comment WHERE post_id = $iPost ORDER BY comment_id DESC";
        $hasil_getAll = mysql_query($query_getAll,$db) or die(mysql_error());
        echo '<div id="komens">';
        while($row = mysql_fetch_array($hasil_getAll))
        {
            echo '<ul class="art-list-body">';
                echo '<li class="art-list-item">';
                    echo '<div class="art-list-item-title-and-time">';
                        echo '<h2 class="art-list-title"><a href="post.php">';
                            // nama yang komen
                        echo $row['nama'];
                        echo '</a></h2>';
                        echo '<div class="art-list-time">';
                            // waktu komen 
                        echo $row['tanggal'];
                        echo '</div>';
                    echo '</div>';
                            // isi komen
                    echo $row['komen'];
                echo '</li>';
            echo '</ul>';
        }
        echo '</div>';
        echo '</div>';
    echo '</div>';
?>
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
    function validateEmail(){
      var x = document.forms["formkomen"]["Email"].value;
       //cek format
       if(x.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
           
           sendComment();
           document.forms["formkomen"].reset();
       } else {    
            alert("invalid email format!");
       }
    }

function sendComment()
{
var nama = document.forms["formkomen"]["Nama"].value;
var email = document.forms["formkomen"]["Email"].value;
var komen = document.forms["formkomen"]["Komentar"].value;

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("komens").innerHTML=xmlhttp.responseText;
    }
  }


xmlhttp.open("GET","savecomment.php?nama="+nama+"&email="+email+"&komentar="+komen+"&iPost="+<?php echo "$iPost"; ?>,true);
xmlhttp.send();
xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("komens").innerHTML = xmlhttp.responseText;
    }
}
}
</script>

</body>
</html>