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

<!-- Mengambil post dengan ID pada parameter !-->
<?php
    $con=mysqli_connect("127.0.0.1","root","","simpleblog");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $ID = $_GET['id'];
    $result = mysqli_query($con,"SELECT * FROM post WHERE ID=$ID");
    $row = mysqli_fetch_array($result);
    echo "<title>Stephen Blog | ".$row['JUDUL']."</title>";
?>
</head>

<body class="default" onLoad="loadcomment()">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Stephen<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">

<!-- Memunculkan post dengan ID pada parameter !-->
<?php
    echo "
    <header class=\"art-header\">
        <div class=\"art-header-inner\" style=\"margin-top: 0px; opacity: 1;\">
            <time class=\"art-time\">".$row['TANGGAL']."</time>
            <h2 class=\"art-title\">".$row['JUDUL']."</h2>
            <p class=\"art-subtitle\"></p>
        </div>
    </header>

    <div class=\"art-body\">
        <div class=\"art-body-inner\">
            <hr class=\"featured-article\" />
            <p>".$row['KONTEN']."</p>
            <hr />
    ";
?>
            <h2>Komentar</h2>

            <div id="contact-area">
            <?php    
                echo "<form method=\"post\" onSubmit=\"return addcomment()\">
                      <input type=\"hidden\" name=\"ID\" id=\"ID\" value=".$row['ID'].">
                ";
            ?>
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" placeholder="cth : example@gmail.com">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body">
                <p id="load"></p>
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

<!-- JavaScript untuk menggunakan fungsi - fungsi AJAX !-->
<script>
    function loadcomment()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("load").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getkomentar.php?id="+document.getElementById("ID").value,true);
        xmlhttp.send();
    }

    function addcomment()
    {
        if(checkComment() && checkEmail(document.getElementById("Email").value))
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                  document.getElementById("load").innerHTML=xmlhttp.responseText;
                  loadcomment();
                  document.getElementById("Nama").value="";
                  document.getElementById("Email").value="";
                  document.getElementById("Komentar").value="";
                }
            }
            xmlhttp.open("POST","add_comment.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("ID="+document.getElementById("ID").value+" &Nama="+document.getElementById("Nama").value+" &Email="+document.getElementById("Email").value+" &Komentar="+document.getElementById("Komentar").value);
        }
        return false;
    }
</script>
<script>
    function checkEmail(email)
    {
        if(email.indexOf("@")!=-1 && email.indexOf(".")!=-1)
        {
            return true;
        }
        else
        {
            alert("Format Email Salah!");
            return false;
        }
    }

    function checkComment()
    {
        if(document.getElementById("Nama").value!="")
        {
            if(document.getElementById("Email").value!="")
            {
                if(document.getElementById("Komentar").value!="")
                {
                    return true;
                }
                else
                {
                    alert("Komentar tidak boleh kosong!");
                    return false;
                }
            }
            else
            {
                alert("Email tidak boleh kosong!");
                return false;
            }
        }
        else
        {
            alert("Nama tidak boleh kosong!");
            return false;
        }
    }
</script>

</body>
</html>