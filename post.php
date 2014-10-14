<?php
	$bulan=array("Januari","Februari","Maret","April","May","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$pid = $_GET["postid"];
	mysql_connect("localhost","root","");
	@mysql_select_db("simpleblog") or die( "Unable to select database");
	$query = "SELECT * FROM post WHERE idpost=".$pid;
	$result = mysql_query($query);
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

<title>Simple Blog | <?php
						$judul = mysql_result($result,0,"judul");
						echo $judul;
					?>
</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Riady's Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php
								$tanggal = mysql_result($result,0,"tanggal");
								$tgl = substr($tanggal,8,2);
								$bln = substr($tanggal,5,2);
								$tahun = substr($tanggal,0,4);
								echo $tgl." ".$bulan[$bln-1]." ".$tahun;
							?>
			</time>
            <h2 class="art-title"><?php
								$judul = mysql_result($result,0,"judul");
								echo $judul;
							?>
			</h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php
				$str = mysql_result($result,0,"konten");
				$arrkont = explode("\n",$str);
				foreach($arrkont as $konten){
					echo '<p>'.htmlentities($konten).'</p>';
				}
				?>
			
          
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" onSubmit="validateEmail(); return false;">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
			<ul class="art-list-body" id="sisip">
			<?php 
				$query = "SELECT * FROM comment WHERE comment.idpost=".$pid." ORDER BY idcomment DESC";
				$result = mysql_query($query);
				$jumcomment = mysql_numrows($result);
				for($i = 0 ; $i < $jumcomment ; $i++){
					$nama = mysql_result($result,$i,"nama");
					$tanggalc = mysql_result($result,$i,"tanggal");
					$year = substr($tanggalc,0,4);
					$month = substr($tanggalc,5,2);
					$day = substr($tanggalc,8,2);
					$hour = substr($tanggalc,11,2);
					$minute = substr($tanggalc,14,2);
					$komen = mysql_result($result,$i,"komentar");	
			?>
			
				<li class="art-list-item">
					<div class="art-list-item-title-and-time">
						<h2 class="art-list-title"><a href="post.html"><?php echo $nama;?></a></h2>
						<div class="art-list-time">
						<?php
							$curDate = getdate();
							if($curDate['year']-$year>0){
								echo $curDate['year']-$year.' tahun yang lalu';
							}
							else if($curDate['mon']-$month>0){
								echo $curDate['mon']-$month.' bulan yang lalu';
							}
							else if($curDate['mday']-$day>0){
								echo $curDate['mday']-$day.' hari yang lalu';
							}
							else if($curDate['hours']-$hour>0){
								echo $curDate['hours']-$hour.' jam yang lalu';
							}
							else{
								echo $curDate['minutes']-$minute.' menit yang lalu';
							}
						?></div>
					</div>
					<p><?php echo $komen;?></p>
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
        Riady 13512024
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
function validateEmail() { 
    var email = document.getElementById("Email").value;
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(email)){
		commentFunc();
	}
	else{
		alert("Masukan format email yang benar");
	}
} 

function commentFunc() {
  var nama = document.getElementById('Nama').value;
  var email = document.getElementById('Email').value;
  var komentar = document.getElementById('Komentar').value;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("sisip").innerHTML=xmlhttp.responseText + document.getElementById("sisip").innerHTML;
    }
  }
  
  xmlhttp.open("POST","add_comment.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("postid=<?php echo $pid;?>"+"&nama="+nama+"&email="+email+"&komen="+komentar);
}
</script>

</body>
</html>