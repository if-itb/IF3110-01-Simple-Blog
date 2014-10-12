<?php include 'functions.php'; 
connect_db("root","","if3110_simple_blog_db");
$selectionQuery = "SELECT * FROM sb_posts WHERE id_post='" . $_GET['pid'] . "'";
$result = run_query($selectionQuery);
$row = mysqli_fetch_array($result);
$pid = $row['id_post'];
$title = $row['judul'];
$date = $row['tanggal'];
$content = $row['konten'];
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

<title>Simple Blog | <?php echo $title; ?></title>

<!--  AJAX function for comments -->
<script>
function submitComment(pid,nama,email,komentar) {
	komentar = komentar.replace(/(\r\n|\n|\r)/gm, '%0A');
	if(pid == ""){
		alert('error, post id tidak didefinisi');
		return false;
	}
	
	// validasi nama
	if(nama == ""){
		alert('isi nama anda untuk berkomentar');
		return false;
	}
	
	// validasi komentar
	if(komentar != ""){
		// validasi email tidak kosong
		if(email == ""){
			alert('isi email anda untuk berkomentar');
			return false;
		}
		// validasi email sesuai kaidah
		else if(validateEmail(email)){
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
				xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("comments").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","comment_processor.php?pid="+pid+"&nama="+nama+"&email="+email+"&komentar="+komentar,true);
			xmlhttp.send();
			return false;
		}
		else{
			alert("alamat email tidak valid");
			return false;
		}
	}
	else{
		alert('komentar tidak boleh kosong');
		return false;
	}
}
function showComments(pid) {
  if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  document.getElementById("comments").innerHTML=xmlhttp.responseText;
	}
  }
  xmlhttp.open("GET","comment_processor.php?pid="+pid,true);
  xmlhttp.send();
}
</script>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 100px; opacity: 1;">
            <time class="art-time"><?php echo tanggalProcessor($date);?></time>
            <h2 class="art-title"><?php echo $title;?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php echo str_replace("\n", "<br>", $content);?>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="#" onSubmit="return submitComment(<?php echo $pid; ?>,Nama.value,Email.value,Komentar.value)">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul id="comments" class="art-list-body">
            	<script>showComments("<?php echo $_GET['pid']; ?>");</script>
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

<script type="text/javascript" src="assets/js/validator.js"></script>
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
