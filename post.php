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

<!--<title>Simple Blog | Apa itu simple blog?</title> -->

<?php
	include ("connect.php");
	$id=$_GET['id'];
	$listpost = mysql_query("SELECT * FROM post WHERE id=".$id);
	
	while($post = mysql_fetch_array($listpost)){?>
					<title>Simple Blog | <?=$post['judul_post']?></title>
				<?php
				}
?>

</head>

<body class="default" onload="load_comment()"> <!--onload="load_comment()"-->
<?php
	$id=$_GET['id'];
	$listpost = mysql_query("SELECT * FROM post WHERE id=".$id);
	
	while($post = mysql_fetch_array($listpost)){
	?>
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
            <time class="art-time"><?=$post['tanggal_post']?></time>
            <h2 class="art-title"><?=$post['judul_post']?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?=$post['konten_post']?></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores animi tenetur nam delectus eveniet iste non culpa laborum provident minima numquam excepturi rem commodi, officia accusamus eos voluptates obcaecati. Possimus?</p>

            <hr />
            
            <h2>Komentar</h2>
			
		
            <div id="contact-area">
                <form method="post" action="#" name="form2" >
					<input type="hidden" name="id_post" id="id_post" value="<?=$_GET['id']?>">
					
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" onblur="validateEmail(document.form2.Email)">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button" onsubmit="return save_comment()"> <!-- -->
                </form>
            </div>
			
			<ul class="art-list-body" id="isi_komentar">
		
			
            
            <!--<li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php">Jems</a></h2>
                        <div class="art-list-time">2 menit lalu</div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                </li>

                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php">Kave</a></h2>
                        <div class="art-list-time">1 jam lalu</div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis repudiandae quae natus quos alias eos repellendus a obcaecati cupiditate similique quibusdam, atque omnis illum, minus ex dolorem facilis tempora deserunt! &hellip;</p>
                </li>-->
            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        author /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="#">Rama</a> /
        
    </aside>
</footer>

</div>


<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
function load_comment()
{
	var id_post= encodeURIComponent(document.getElementById("id_post").value);
	
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("isi_komentar").innerHTML=xmlhttp.responseText;
		}
	}
	
	var param = id_post;
	xmlhttp.open("GET", "load_comment.php?id="+param, true);
	xmlhttp.send(null);
}
function isEmpty(teks)
{
	if (teks.length<=0 || teks==null)
	{
		return true;
	}
	return false;
}
function validate_comment(nama, email, komentar)
{
	if (isEmpty(nama)){
		alert('Kolom nama tidak boleh kosong!');
		return false;
	}
	 if (isEmpty(email)){
		alert('Kolom email tidak boleh kosong!');
		return false;
	} 
	if (isEmpty(komentar)){
		alert('Kolom komentar tidak boleh kosong!');
		return false;
	} 
	/* if (!validateEmail()){
		alert('Format email salah!');
		return false;
	} */ 
	return true;
}
function save_comment()
{
	var nama = encodeURIComponent(document.getElementById("Nama").value);
	var id_post= encodeURIComponent(document.getElementById("id_post").value);
	var email= encodeURIComponent(document.getElementById("Email").value);
	var komentar= encodeURIComponent(document.getElementById("Komentar").value);
	
	//alert(email);
	if (validate_comment(nama, email, komentar)==true)
	{//return false;}
	//alert(nama);
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			savedComments = document.getElementById("isi_komentar").innerHTML;
			document.getElementById("isi_komentar").innerHTML = savedComments + xmlhttp.responseText;
			
			document.getElementById("Nama").value='';
			document.getElementById("Email").value='';
			document.getElementById("Komentar").value='';
		}
	}
	var param = "id=" + id_post + "&nama=" + nama + "&email=" + email + "&komentar=" + komentar;
	
	xmlhttp.open("POST", "save_comment.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(param);
	//alert(param);
	}else{return false;}
}

function validateEmail(teks)
{
	var email = document.getElementById("Email").value;
	var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (teks.value.match(format))
	{
		document.form2.Email.focus();
		//document.getElementById("submit").disabled=false;
		return true;
	}
	else
	{
		document.form2.Email.focus();
		alert('Format email salah!');
		document.getElementById("submit").disabled=true;
		return false;
	}
}

function komen()
{
	var nama = encodeURIComponent(document.getElementById("Nama").value);
	var id_post= encodeURIComponent(document.getElementById("id_post").value);
	var email= encodeURIComponent(document.getElementById("Email").value);
	var komentar= encodeURIComponent(document.getElementById("Komentar").value);
	
	if (validate_comment(nama, email, komentar))
	{
		save_comment();
		return true;
	}else{return false;}
}
</script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>
<?php } ?>
</body>
</html>