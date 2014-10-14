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

<?php
    $con = mysqli_connect("localhost","root","","tugaswbd1");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql";
    }
    if(isset($_GET['id'])){
        $postID = $_GET['id'];

        $post = mysqli_query($con, "SELECT * FROM post where post_id = $postID");
        $row = mysqli_fetch_array($post);
        $judul = $row['post_judul'];
        $tanggal = $row['post_tanggal'];
        $konten = $row['post_konten'];
    }

?>

</head>

<body class="default">

<img src="assets/img/Subtle_Ocean.jpg" class="background">

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
            <time class="art-time"><?php echo $tanggal ?></time>
            <h2 class="art-title"><?php echo $judul ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php echo $konten ?>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" id="formKomentar" onsubmit = "AddComment(); return false">
                    <input type="hidden" name="pid" id="pid" value="<?php echo $postID;?>">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama" required>
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" required>
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" lass="submit-button">
                </form>
            </div>

            <?php
                $queryKomentar = mysqli_query($con,"SELECT * FROM komentar WHERE komentar_idpost = '$postID' ORDER BY komentar_idKomentar DESC");
            ?>

            <ul class="art-list-body" id="ListKomentar">
                <?php 

                $con = mysql_connect("localhost","root","");
                $dbselect = mysql_select_db("tugaswbd1");
                function DisplayWaktu($waktu){
                    $time = (time()-4+18000) - strtotime($waktu);

                    $seconds = array(
                        31536000 => 'year',
                        2592000 => 'month',
                        604800 => 'week',
                        86400 => 'day',
                        3600 =>'hour',
                        60 => 'minute',
                        1 => 'second'
                    );
                    foreach($seconds as $unit => $text){
                        if($time < $unit) continue;
                        $totalUnits = floor($time / $unit);

                        return $totalUnits.' '.$text.(($totalUnits>1)?'s ':' ')."ago";
                    }
                  
                }
        
                $query = mysql_query("SELECT * FROM komentar where komentar_idpost = $postID ORDER BY komentar_idKomentar DESC") or die (mysql_error());

                 while($row = mysql_fetch_assoc($query)){
                    $nama = $row['komentar_nama'];
                    $email = $row['komentar_email'];
                    $komentar = $row['komentar_konten'];
                    $tanggal = $row['komentar_tanggal'];

                    echo "<li class=\"art-list-item\">";
                        echo "<div class=\"art-list-item-title-and-time\">";
                        echo "<h2 class=\"art-list-title\">".$nama."</h2>";
                        echo "<div class=\"art-list-time\">".DisplayWaktu($tanggal)."</div>";
                        echo "</div>";
                        echo "<p>".$komentar."</p>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="#">Back to top</a></div>
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


     
    function AddComment(){
        var xmlHttpObj = getXmlHttpRequest();
        var postID = document.getElementById('pid').value;
        var nama = document.getElementById('Nama').value;
        var email = document.getElementById('Email').value;
        var komentar = document.getElementById('Komentar').value;

        if(validateEmail()){            
            xmlHttpObj.open("GET", "komentar.php?pid="+postID+"&nama="+nama+"&email="+email+"&komentar="+komentar,true);
            xmlHttpObj.send();
            xmlHttpObj.onreadystatechange = function(){
                if(xmlHttpObj.readyState == 4 && xmlHttpObj.status==200){
                    document.getElementById("ListKomentar").innerHTML = xmlHttpObj.responseText;
                }
            }
            document.getElementById('formKomentar').reset();
        }
    }

    function validateEmail(){
        var email = document.forms["formKomentar"]["Email"].value;
        var regex = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
        if(!regex.test(email)){
            alert("Invalid email address.");
            return false;
        }
        else{
            return true;
        }
    }

    function getXmlHttpRequest(){
        var xmlHttpObj;
        if(window.XMLHttpRequest){
            xmlHttpObj = new XMLHttpRequest();
        }
        else{
            try{
                xmlHttpObj = new ActiveXObject("Msmx12.XMLHTTP");
            }
            catch(e){
                try{
                    xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e){
                    xmlHttpObj = false;
                }
            }
        }
        return xmlHttpObj;
    }
</script>

</body>
</html>