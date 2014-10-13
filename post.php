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

<body class="default" onload="LoadComments();">

<?php
$con=mysqli_connect("localhost", "root", "", "SimpleBlog");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$ID = $_GET['id'];
$resultPost = mysqli_query($con,"SELECT Judul, Tanggal, Konten FROM Posts WHERE PID=".$ID);
$row = mysqli_fetch_array($resultPost);
?>

<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    <?php
		echo '
			<header class="art-header">
				<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
					<time class="art-time">'.$row['Tanggal'] .'</time>
					<h2 class="art-title">'.$row['Judul'].'</h2>
					<p class="art-subtitle"></p>
				</div>
			</header>
		';
	?>
    

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $row['Konten']; ?></p>
            <hr />
            
            <h2>Komentar</h2>
			
            <div id="contact-area">
                <form name="Comment" method="post" onSubmit="CommentAjax(); return false">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama" required>
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" required>
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar" required></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id="CommentList">

            </ul>
        </div>
    </div>

</article>
<?php
mysqli_close($con);
?>

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

<script type="text/javascript">
	function ValidasiEmail() {
		var cek = true;
		var x = document.forms["Comment"]["Email"].value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
			alert("Bukan alamat e-mail yang valid!!");
			cek = false;
		}
		return cek;
	}

	function CommentAjax() {
		// Create an XMLHttpRequest Object
		if (window.XMLHttpRequest) {
			xmlHttpObj = new XMLHttpRequest( );
		} else {
			try {
				xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlHttpObj = false;
				}
			}
		}
		var PID = <?php echo $ID ?>;
		var Nama = document.getElementById('Nama').value;
		var Email = document.getElementById('Email').value;
		var Komentar = document.getElementById('Komentar').value;
		
		// Create a function that will receive data sent from the server
		if(ValidasiEmail()) {
			xmlHttpObj.open("GET", "new_comment.php?PID=" + PID + "&Nama=" + Nama + "&Email=" + Email + "&Komentar=" + Komentar, true);
			xmlHttpObj.send(null);
			xmlHttpObj.onreadystatechange = function() {
		 		if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
					document.getElementById("CommentList").innerHTML=xmlHttpObj.responseText;
				}
			}
		}
	}
	
	function LoadComments() {
		// Create an XMLHttpRequest Object
		if (window.XMLHttpRequest) {
			xmlHttpObj = new XMLHttpRequest( );
		} else {
			try {
				xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					xmlHttpObj = false;
				}
			}
		}
		var PID = <?php echo $ID ?>;
		
		// Create a function that will receive data sent from the server
		xmlHttpObj.open("GET", "load_comment.php?PID=" + PID, true);
		xmlHttpObj.send(null);
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("CommentList").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
</script>
</body>
</html>