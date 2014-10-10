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

<title>Simple Blog</title>
</head>

<body class="default">
<div class="wrapper">
<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
        <nav class="art-list">
          <ul class="art-list-body">
			<?php
				include("connect.php");
				$no =	$_GET['id'];
				$query	=	mysql_query("SELECT * from post WHERE no=$no");
					$hasil_eksekusi = mysql_fetch_array($query);
						$nomor	=	$hasil_eksekusi['no'];
						$judul	=	$hasil_eksekusi['judul'];
						$tanggal	=	$hasil_eksekusi['tanggal'];
						$konten	=	$hasil_eksekusi['konten'];

				echo '
					<center>
					<table border=1 style="align:center" >
						<tr>
							<td colspan="2" align="center">
								<h4>'.$judul.'</h4>
							</td>
						</tr>
						<tr>
							<td>
								'.$tanggal.'
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<p>'.$konten.'</p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
							  <a href="edit_post.php?id='.$nomor.'">Edit</a> | <a href="delete.php?id='.$nomor.'">Hapus</a>
							</td>
						</tr>
						<tr>

							<td colspan="2">
								<hr/>
								<div id="Komentar">
								</div>
								<hr/>
								<div id="formKomentar">
									<form method="post" action="post_komentar.php">
										Nama <input type="text" id="pNama" name="nama"><br/>
										Email <input type="text" id="pEmail" name="email" ><br/>
										Pesan<br/>
											<textarea id="pPesan" name="pesan" cols="84" rows="5"></textarea><br/>
										<input type="hidden" id="pTanggal" name="tanggal" value="'.date("Y-m-d").'">
										<input type="hidden" id="pId" name="id" value="'.$_GET['id'].'">
										<input type="button" name="postKomentar" value="Post Komentar" onclick="return cekEmail();">
									</form>
								</div>
							</td>
						</tr>
					</table>

				</center>
				<div id="terbaru" align="center">

				</div>
				<hr/>
				';
				$query	=	mysql_query("SELECT * from comments WHERE post_id_fk=$no ORDER BY com_date DESC");
				while($hasil_eksekusi = mysql_fetch_array($query)){
					$name	=	$hasil_eksekusi['com_name'];
					$tanggal	=	$hasil_eksekusi['com_date'];
					$konten	=	$hasil_eksekusi['com_dis'];

					echo '
						<div id="unit-komentar" align="center">
							'.$name.'<br/>
							'.$tanggal.'<br/>
							'.$konten.'</br>
							<hr/>
						</div>
					';

				}
			?>
          </ul>
        </nav>
    </div>
</div>
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
function cekEmail() {
	var x = document.getElementById("pEmail").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }else{
		PostKomentar();
	}
}
function PostKomentar(){
	var isinama = document.getElementById("pNama").value;
	var isiemail = document.getElementById("pEmail").value;
	var isipesan = document.getElementById("pPesan").value;
	var isiid = document.getElementById("pId").value;
	var xmlhttp=GetXmlHttpObject();
	if(xmlhttp==null){
		alert("Silahkan gunakan browser yang mendukung AJAX");
		return;
	}	
	var url	=	"post_komentar.php";
    var param="nama="+isinama+"&email="+isiemail+"&pesan="+isipesan+"&id="+isiid;
	document.getElementById("terbaru").innerHTML = "Sedang memproses komentar";
	var message = "<div id=unit-komentar align=center><br>" + isinama + "<br>" + isiemail + "<br>" + isipesan + "<hr></div>";
	document.getElementById("terbaru").innerHTML = message;
    xmlhttp.open("POST",url,true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", param.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(param);
}

function GetXmlHttpObject() {
    var xmlhttp=null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlhttp=new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
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