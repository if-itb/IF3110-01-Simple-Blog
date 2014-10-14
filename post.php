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
$con=mysqli_connect("localhost","root","","cilvia_simpleblog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$pid = $_GET['id'];

$result = mysqli_query($con,"SELECT * FROM list_post WHERE PostID='$pid'");						
if (!$result) {
   die(mysql_error());
}

$row = mysqli_fetch_array($result);

echo '<title>Simple Blog | '.$row['judul'].'</title>';
?>

</head>

<body class="default" onload="loadComment()">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">


<?php
	echo '<header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time">' . $row['tanggal'] . '</time>
            <h2 class="art-title">' . $row['judul'] . '</h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p>'.$row['konten'].'</p>
            <hr />';

?>
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" onsubmit="return submitComment()">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body">
			<div  id="Komen">
			</div>
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
<!--<script type="text/javascript" src="assets/js/fungsi.js"></script>-->
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
function submitComment() {
	if (validasiEmail()){
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  
		} else {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		var pid = <?php echo $pid; ?>;
		var nama = encodeURIComponent(document.getElementById("Nama").value);
		var email = encodeURIComponent(document.getElementById("Email").value);
		var komentar = encodeURIComponent(document.getElementById("Komentar").value);
		if (nama != "" && komentar != ""){
			xmlhttp.open("GET","submit_comment.php?pid="+pid+"&nama="+nama+"&email="+email+"&komentar="+komentar,true);
			xmlhttp.send();
			xmlhttp.onreadystatechange=function(){
			  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("Komen").innerHTML=xmlhttp.responseText;
				document.getElementById("Nama").innerHTML = "";
				document.getElementById("Email").innerHTML = "";
				document.getElementById("Komentar").innerHTML = "";
			  }
			}
		} else {
			alert("nama atau komentar harap diisi");
		}
	} else {
		alert("input email salah");
	}
	return false;
}
function loadComment(){
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  
	} else {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var pid = <?php echo $pid; ?>;
	xmlhttp.open("GET","load_comment.php?pid="+pid,true);
	xmlhttp.send();
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("Komen").innerHTML=xmlhttp.responseText;
	  }
	}
	return false;
}
function validasiEmail(){
	var email = document.getElementById("Email").value;
	
	var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email.match(pattern)){
		return true;
	} else {
		return false;
	}
	
}
</script>

</body>
</html>