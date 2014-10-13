<?php 
/******************************************************************************************
 * TUBES 1 WBD
 * ------------
 * NAMA		:	Andre Susanto
 * NIM		:	135 12 028
 ******************************************************************************************/

require_once 'config.php';

$id = req_handler('id');
$err = 0;

if (! ($konten = db_fetch("SELECT * FROM `post` WHERE `id_post`='$id'"))){
	$err = 1;
	$konten['judul'] = "404";
}
?>
<!DOCTYPE html>
<html>
<head>
<base href="<?php echo $systemurl; ?>">

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

<title>Simple Blog | <?php echo $konten['judul']; ?></title>
<?php if (!$err) { ?>
<script type="text/javascript">
<!--
function refreshKomentar() {
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 ) {
           if(xmlhttp.status == 200){
               document.getElementById("isi_komentar").innerHTML = xmlhttp.responseText;
           }
        }
    }

    xmlhttp.open("GET", "cmt/<?php echo $id; ?>", true);
    xmlhttp.send();
}

function submitKomentar(){
	var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 ) {
           if(xmlhttp.status == 200){
        	   document.getElementById("Nama").value = "";
        	   document.getElementById("Email").value = "";
        	   document.getElementById("Komentar").value = "";
        	   document.getElementById("isi_komentar").innerHTML = xmlhttp.responseText;
        	   document.getElementById("komentar_status").innerHTML = "<font color='green'>Komentar berhasil ditambahkan!</font>";
               
           }
        }
    }

    xmlhttp.open("POST","cmt/<?php echo $id; ?>",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("nama="+encodeURI(document.getElementById("Nama").value)+"&email="+encodeURI(document.getElementById("Email").value)+"&komentar="+encodeURI(document.getElementById("Komentar").value));

	return false;
}
-->
</script>
<?php } ?>
</head>

<body class="default" onload="refreshKomentar()">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href=""><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new">+ Tambah Post</a></li>
    </ul>
</nav>
<?php if ($err){ ?>
<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <h2 class="art-title">404 - Not Found</h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p>Maaf, anda menuju pada URL yang salah. Silahkan periksa kembali URL anda!</p>
            
        </div>
    </div>

</article>
<?php }else{ ?>
<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo date("j F Y",strtotime($konten['stamp'])); ?></time>
            <h2 class="art-title"><?php echo $konten['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php echo str_replace("\n","\n<br/>", $konten['konten']); ?>
            
            
            <div id="contact-area">
            <h2>Komentar</h2>
            <hr/>
 <ul id="isi_komentar" class="art-list-body">
                
            </ul>
            <hr/><br/>
            <div id="komentar_status"></div>
                <form method="post" action="" onsubmit="return submitKomentar()">
                	
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

           
        </div>
    </div>

</article>
<?php } ?>
<footer class="footer">
    <div class="back-to-top"><a href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">Back to top</a></div>
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

</body>
</html>