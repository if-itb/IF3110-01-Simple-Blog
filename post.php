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


<?php
// Create connection
$con=mysqli_connect("Localhost", "root","windy","blogwindy");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id_post = $_GET['id'];

$result = mysqli_query($con,"SELECT * FROM post WHERE id_post='$id_post'");
$row = mysqli_fetch_array($result);

$hasilkomentar = mysqli_query($con,"SELECT * FROM komentar WHERE id_post='$id_post'");
?>
<title>Simple Blog | <?php echo $row['Judul']; ?></title>


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
    
    <header class="art-header">
        <div class="art-header-inner">
            <time class="art-time"><?php echo $row['Tanggal']; ?></time>
            <h2 class="art-title"><?php echo $row['Judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p> <?php echo $row['Konten']; ?></p>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="" id="Form_komentar">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="return validasi_email()">
                </form>
            </div>

            <script>
                
            </script>

            <ul class="art-list-body">
                <div id="komentar">
                <?php 
                while($row_komen = mysqli_fetch_array($hasilkomentar)){ ?>
                    <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                    <h2 class="art-list-title"><a href="post.php?id=<?php echo $row_komen['id_post']; ?>"><?php echo $row_komen['Nama']; ?></a></h2>
                        <div class="art-list-time"><?php echo $row_komen['Tanggal']; ?></div>
                    </div>
                    <p><?php echo $row_komen['Komentar']; ?></p>
                </li>
                <?php } ?>
                </div>
            </ul>
        </div>
    </div>

</article>

<script>
function validasi_email() {
    var x = document.forms["Form_komentar"]["Email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
       alert("Email tidak valid.");
       return false;
    } else {
        submit_komentar();
    }
}

function submit_komentar()
{
    var ValNama = document.getElementById("Nama").value;
    var ValEmail = document.getElementById("Email").value;
    var ValKomentar = document.getElementById("Komentar").value;
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.open("GET","add_komentar.php?id="+<?php echo $id_post?>+"&Nama=" + ValNama +"&Email=" + ValEmail + "&Komentar=" + ValKomentar,true);
    xmlhttp.send();
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        //alert(xmlhttp.responseText);
        document.getElementById("komentar").innerHTML=xmlhttp.responseText;
        }
      }
      document.getElementById("Nama").value="";
      document.getElementById("Email").value="";
      document.getElementById("Komentar").value="";
}
</script>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <div class="psi">Windy Amelia</div>
    <aside class="offsite-links"><a href="https://www.facebook.com/windy.amelia.52" target="_blank">
       <img src="fb.png" style="width:40px;height:40px"></a>
    </aside>
</footer>

</div>

</body>
</html>