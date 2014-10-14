<?php
	include 'connect.php';
	include 'ConvertDateFunc.php';
	
	$mode = $_GET['mode'];
	$judul = null;
	$sqldate = null;
	$tanggal = null;
	$konten = null;
	
	if($mode==1){ //mode edit post
	$id_post = $_GET['id_post'];
		$postQuery= 'SELECT * FROM `tucildb_13511097`.`listpost` WHERE `id`='.$id_post;
				$postResult =  mysql_query($postQuery,$con);
				if($postResult === FALSE) {
					die(mysql_error()); // TODO: better error handling
				}
				while($search_row = mysql_fetch_array($postResult)) {
					$judul = $search_row['title'];
					$sqldate = $search_row['date'];
					$tanggal = ConvertDate($sqldate);
					$konten = $search_row['post'];
					
				}
	}
	
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

<title>Simple Blog | Tambah Post</title>


</head>
<body class="default">
<script>
function ValidasiTanggal(){
		var tgl = document.getElementById("Tanggal").value;
		var today = new Date();
		var cek = new Date(tgl);
		var err_pass = document.getElementById("err_pass");
		
		if(cek>=today){
			err_pass.innerHTML = "OK";
			document.getElementById("submit").disabled = false;
		}else{
			err_pass.innerHTML = "masukkan tanggal minimal hari ini";
			document.getElementById("submit").disabled = true;
		}
		
	}
	
function ValidasiAll(){
	var judul = document.getElementById("Judul").value;
	var konten = document.getElementById("Konten").value;
	var err_pass = document.getElementById("err_pass");
	
	
	if (judul!=null && konten!=null && err_pass.innerHTML == "OK"){
		document.getElementById("submit").disabled = false;
	}else{
		document.getElementById("submit").disabled = true;
	}
}
	
</script>
<div class="wrapper">
<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php?mode=0">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="not-art-body">
        <div class="art-body-inner">
		<?php
			if ($mode==0) { // tambah post baru
				echo '<h2>Tambah Post</h2>';
			}else{ // edit post baru
				echo '<h2>Edit Post</h2>';
			}
		?>
            <div id="contact-area">
                <form method="get" action="AddPostProcess.php" name="AddPost">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" value="<?php echo $judul;?>" id="Judul" onkeyup ="ValidasiAll()" onmousedown ="ValidasiAll()" >

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" value="<?php echo $sqldate;?>" id="Tanggal" onkeyup ="ValidasiTanggal()" onmousedown ="ValidasiTanggal()"><div id="err_pass" onkeyup ="ValidasiAll()" onmousedown ="ValidasiAll()">format=yyyy-mm-dd</div><br>
                 
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20"  id="Konten" onkeyup ="ValidasiAll()" onmousedown ="ValidasiAll()"><?php echo $konten;?></textarea>
					<input type="hidden" name="mode" value="<?php echo $mode; ?>">
					<?php
						if ($mode==1) {
							echo '<input type="hidden" name="id_post" value="'.$id_post.'">';
						}
					?>
                    <input type="submit" name="submit" id="submit" value="Simpan" class="submit-button" disabled>
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
	
	}
</script>

</body>
</html>