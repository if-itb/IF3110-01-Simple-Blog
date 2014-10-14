<?PHP
include("getallposts.php");

$table 	= "comments";
$sql	= "SELECT * FROM $table WHERE id_post = '$_GET[id]'";
$result	= mysql_query($sql);
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

<title>Sima Blog | <?PHP echo $row['judul_post'] ?></title>

</head>

<body class="default" onload=bufferComments();>
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Sima<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-bottom: 0px; opacity: 1;">
            <time class="art-time"><?PHP echo $row['tanggal_post'] ?></time>
            <h2 class="art-title"><?PHP echo $row['judul_post'] ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?PHP echo $row['konten_post'] ?></p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" onSubmit="return addComment()">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="komentar"></textarea>
					
					<label for="ID"></label>
					<input type="hidden" name="ID" id="id" value=<?PHP echo $_GET['id']; ?>>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body">
				<p id="idComment"></p>
            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Andrey Simaputera
        
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
function bufferComments(){
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("idComment").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","getallcomments.php?id="+document.getElementById("id").value,true);
	xmlhttp.send();
}
</script>
<script>
function addComment(){
	if(checkEmail()){
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById("idComment").innerHTML=xmlhttp.responseText;
			  bufferComments();
			  document.getElementById("nama").value="";
			  document.getElementById("email").value="";
			  document.getElementById("komentar").value="";
			}
		}
		xmlhttp.open("POST","db_comment.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("ID="+document.getElementById("id").value+" &Nama="+document.getElementById("nama").value+" &Email="+document.getElementById("email").value+" &Komentar="+document.getElementById("komentar").value);
	}
	return false;
}  
</script>
<script>
function checkEmail(){
	var at = document.getElementById("email").value.indexOf("@");
	var dot = document.getElementById("email").value.lastIndexOf(".");
	
	if(at!=-1 && dot!=-1 && at<dot){
		return true;
	}
	else{
		alert("E-mail anda salah!!")
		return false;
	}
}
</script>

</body>
</html>