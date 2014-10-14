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

<body class="default" onload="get_komentar()">
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
            <?php

            //create connection
            $connect=mysqli_connect("localhost","root", "", "simple_blog");
            // Check connection
            if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            $result = mysqli_query($connect,"SELECT * FROM posting WHERE ID= ". $_GET['id'] ." ");
            $row = mysqli_fetch_array($result);

            echo "<time class=\"art-time\"> ". $row['Tanggal'] ." </time>
            <h2 class=\"art-title\"> ". $row['Judul'] ."</h2>
            <p class=\"art-subtitle\"></p>
        </div>
    </header>

    <div class=\"art-body\">
        <div class=\"art-body-inner\">
            <hr class=\"featured-article\" />
            <p> ".$row['Konten']." </p>
            
            <hr />
            
            <h2>Komentar</h2>

            <div id=\"contact-area\">
                <form method=\"post\" onSubmit=\"return post_komentar()\" >
                    <input type=\"hidden\" name=\"ID\" id=\"ID\" value=\"".$_GET['id']." \">
                    "; ?>
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama"> 
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id="Tempat_Komentar">
           
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 id ="Nama_Komentar" class="art-list-title"><a href="post.php">  </a></h2>
                        <div id ="Tanggal_Komentar" class="art-list-time">  </div>
                    </div>
                    <p id ="Komentar_Komentar"> </p>
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
        Web Based Development
        <br>
        <a class="twitter-link" >Facebook</a> :
        <a class="twitter-link" href="http://facebook.com/susantigojali">Susanti Gojali</a> 
        <br>
        <a class="twitter-link" >Twitter</a> :
        <a class="twitter-link" href="http://twitter.com/susantigojali">Susanti Gojali</a>
        
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




<script>
function get_komentar()
{

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
            document.getElementById("Tempat_Komentar").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","get_komentar.php?id="+ document.getElementById("ID").value,true);

    
    xmlhttp.send();
}
</script>


<script>


function checkemail()
{
    
    var foundAt= document.getElementById("Email").value.indexOf("@");
    var foundDot= document.getElementById("Email").value.lastIndexOf(".");
   
    if(foundAt!= -1 && foundDot!= -1 && foundAt+1<foundDot && foundAt>0 && foundDot+1<document.getElementById("Email").value.length)
    {
        return true;
    }
    else
    {
        return false;
    }
}

</script>

<script>
function checkform()
{
    
    if(document.getElementById("Nama").value!="" && document.getElementById("Email").value!= "" &&
     document.getElementById("Komentar").value!= "")
    {
        return true;
    }
    else
    {
        return false;
    }
}

</script>


<script>
function post_komentar()
{
    var email=document.getElementById("Email").value;

    if(checkform())
    {
        if(checkemail())
        {
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
                    document.getElementById("Nama").value="";
                    document.getElementById("Email").value="";
                    document.getElementById("Komentar").value="";
                    get_komentar();
                }
            }
            var ID=document.getElementById("ID").value;
            var Nama=document.getElementById("Nama").value;
            var Email=document.getElementById("Email").value;
            var Komentar=document.getElementById("Komentar").value;


            xmlhttp.open("POST","post_komentar.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("ID= "+ ID+ " & Nama= "+ Nama +" & Email= " + Email + " & Komentar= " + Komentar+ " ");
            
        }
        else
        {
            alert("Email not valid");
        }
    }
    else
    {
        alert("Tidak bisa post komentar kosong");
    }
    return false;
    
}
</script>




</body>
</html>