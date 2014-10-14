<?php
if(!isset($_GET['id'])){
	header('location:index.php');
}
$postid=$_GET['id'];
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

<title>Simple Blog</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<?php
$db=mysqli_connect("Localhost","root","","wbdsimpleblog");
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
$posts=mysqli_query($db,"SELECT * FROM post WHERE pid=".$postid);
if (!$posts) {
	// error di query nya
}
else {
	$post = $posts->fetch_assoc();
}

echo
'<article class="art simple post">    
    <header class="art-header" style="position=absolute;">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time">'.$post['tanggal'].'</time>
            <h2 class="art-title" >'.$post['judul'].'</h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p>'.$post['konten'].'</p>
			<a href="new_post.php?id='.$postid.'">Edit</a> | <a href="deletepost.php?id='.$post['pid'].'" onclick="return confirmdelete()">Hapus</a>'; 
  ?>
            <hr />
            
            <h2 style="margin-top=200px;">Komentar</h2>

            <div id="contact-area">
                <form method="post" id="commentform" onsubmit="submitcomment(this); return false">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id="comment-area">
				<?php
				$comments=mysqli_query($db,"SELECT * FROM comment where pid=".$postid." order by tglkomen desc"); 
				while($row=mysqli_fetch_array($comments)){
				echo'
					<li class="art-list-item">
						<div class="art-list-item-title-and-time">
							<h2 class="art-list-title">'.$row["nama"].'</h2>
							<div class="art-list-time">'.$row["email"].'</div>
							<div class="art-list-time">'.$row["tglkomen"].'</div>
						</div><div style="margin-left:230px;">'.$row["komen"].'</div></li>';
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
        By: <a class="twitter-link" href="http://twitter.com/ardiwii">Ardi Wicaksono/13512063</a>
		<br>
        Template by: Asisten IF3110 /
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

<script type="text/javascript">
function confirmdelete(){
	if (!confirm("Apakah Anda yakin menghapus post ini?")){
		return false;}
	}

//function validate(){
//}

function loadXMLDoc(formdata,url,cfunc)
		{
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=cfunc;
		xmlhttp.open("POST",url,true);
		xmlhttp.send(formdata);
		}

function submitcomment(formcontent){
	var inputemail = document.getElementById('Email').value;
	var isemailvalid = inputemail.search("[A-Za-z0-9.\-_]+\@[A-Za-z0-9.\-_]+\.[a-z]+");
	var namelength = document.getElementById('Nama').value.length;
	var kontenlength = document.getElementById('Komentar').value.length;
	if(namelength>12){
		alert("nama terlalu panjang")
		return false;
	}
	if(namelength==12){
		alert("nama tidak boleh kosong")
		return false;
	}
	if(isemailvalid!='0' || inputemail.length>25){
		alert("email terlalu panjang atau tidak valid");
		return false;
	}
	if(kontenlength==0){
		alert("komentar tidak boleh kosong")
		return false;
	}
	var passeddata = new FormData(formcontent);
	loadXMLDoc(passeddata,"submitcomment.php?id="+<?php echo $postid ?>,function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("comment-area").innerHTML = xmlhttp.responseText + document.getElementById("comment-area").innerHTML;
			}
		  });
		  document.getElementById("commentform").reset();
	  }
	

</script>

<?php mysqli_close($db);
?>
</div>
<!--
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
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
-->
</body>
</html>
