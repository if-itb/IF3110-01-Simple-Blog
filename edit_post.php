<?php 
/******************************************************************************************
 * TUBES 1 WBD
 * ------------
 * NAMA		:	Andre Susanto
 * NIM		:	135 12 028
 ******************************************************************************************/

require_once 'config.php';

$id = req_handler('id');
$post = db_fetch("SELECT * FROM `post` WHERE id_post='$id'");

if (!$post){
	header("location:" . $systemurl);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$judul = req_handler('Judul');
	$tgl = req_handler('Tanggal');
	$konten = req_handler('Konten');
	
	if (db_execute("UPDATE `post` SET `judul`='$judul', `konten`='$konten', `stamp`='$tgl' WHERE id_post='$post[id_post]'")) $ok = 1;
}else{
	$judul = $post['judul'];
	$tgl = $post['stamp'];
	$konten = $post['konten'];
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

<title>Simple Blog | Tambah Post</title>

<script type="text/javascript">
<!--
function validasi(){
	if (document.getElementById("Judul").value == ""){
		alert ('Judul tidak boleh kosong!');
		document.getElementById("Judul").focus();
		return false;
	}
	
	var tgl = /([0-9]+)-([0-9]+)-([0-9]+)/.test(document.getElementById("Tanggal").value);

	if (tgl){
		/*if (new Date(document.getElementById("Tanggal").value).getTime() + 86399000 < new Date().getTime()){
			alert('Tanggal harus lebih besar atau sama dengan hari ini! ');
			document.getElementById("Tanggal").focus();
			return false;
		}*/
	}else{
		alert('Tanggal harus menggunakan format YYYY-MM-DD!');
		document.getElementById("Tanggal").focus();
		return false;
	}

	if (document.getElementById("Konten").value == ""){
		alert ('Konten tidak boleh kosong!');
		document.getElementById("Konten").focus();
		return false;
	}


	return true;
	
}
-->
</script>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href=""><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Edit Post</h2>
			<?php if (isset($ok)) { ?><font color="green">Post berhasil diedit!</font> <?php } ?>
            <div id="contact-area">
                <form method="post" action="edit/<?php echo $id; ?>" onsubmit="return validasi();">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" value="<?php echo $judul; ?>" id="Judul" placeholder="Judul artikel">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="<?php echo $tgl; ?>" placeholder="Tanggal, Format YYYY-MM-DD">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten" placeholder="Konten artikel ..."><?php echo $konten; ?></textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
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