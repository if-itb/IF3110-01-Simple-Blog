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
	include('connectdb.php');
	$pid = $_GET['pid'];
	$query = mysql_query("SELECT * FROM post where pid = '$pid'") or die (mysql_error());
	$row = mysql_fetch_assoc($query);
	$judul = $row['judul'];
	$tanggal = $row['tanggal'];
	$konten = $row['konten'];
	echo "<title>".$judul."</title>";
?>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a name="top"></a>
	<a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $tanggal;?></time>
            <h2 class="art-title"><?php echo $judul;?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php echo "<p>".$konten."</p>";?>

            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form id="form" method="post" onsubmit="AddComment(); return false">
					<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="nama" id="nama" required>
                    <label for="Email">Email:</label>
                    <input type="text" name="email" id="email" required>
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="komentar" rows="20" cols="20" id="komentar" required></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button" >
                </form>
            </div>

            <ul class="art-list-body" id="ListKomentar">
                <?php 
				include('connectdb.php');
				function DisplayWaktu($waktu){
					$time = time() - strtotime($waktu);
					$seconds = array(
						31536000 => 'year',
						2592000 => 'month',
						604800 => 'week',
						86400 => 'day',
						3600 => 'hour',
						60 => 'minute',
						1 => 'second'
					);
					foreach ($seconds as $unit => $text){
						if($time < $unit) continue;
						$totalUnits = floor($time / $unit);
						return $totalUnits.' '.$text.(($totalUnits>1)?'s ':' ')."ago";
					}
				}
				$query = mysql_query("SELECT * FROM komentar where pid = $pid order by id desc" ) or die (mysql_error());
					while($row = mysql_fetch_assoc($query)){
						$nama = $row['nama'];
						$email = $row['email'];
						$komentar = $row['komentar'];
						$tanggal = $row['tanggal'];
						echo "<li class=\"art-list-item\">
							<div class=\"art-list-item-title-and-time\">
								<h2 class=\"art-list-title\">".$nama."</a></h2>
								<div class=\"art-list-time\">".DisplayWaktu($tanggal)."</div>
							</div>
							<p>".$komentar."</p>
							</li>";
					}
				?>
            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="#top">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Tugas IF3110 / Simple-Blog
        <br>
        <a class="twitter-link" href="https://www.facebook.com/eldwin.christian.5">Eldwin Christian</a> / 13512002
        <br>
    </aside>
</footer>

<script type="text/javascript">
	function AddComment(){
		var xmlHttpObj = getXmlHttpRequest();
		var pid = document.getElementById('pid').value;
		var nama = document.getElementById('nama').value;
		var email = document.getElementById('email').value;
		var komentar = document.getElementById('komentar').value;
		if(cekEmail()){
			xmlHttpObj.open("GET", "inputkomentar.php?pid=" + pid +"&nama=" + nama +"&email=" + email+"&komentar="+komentar,true);		
			xmlHttpObj.send();
			xmlHttpObj.onreadystatechange = function() {
				if(xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200){
					alert("Komentar telah ditambahkan");
					document.getElementById("ListKomentar").innerHTML = xmlHttpObj.responseText;
				}
			}
			document.getElementById('form').reset();
		}
	}
	function cekEmail() {
	var cek = document.getElementById('email').value;
	var atpos = cek.indexOf("@");
	var dotpos = cek.lastIndexOf(".");
      if(atpos<1 || dotpos<atpos+2 || dotpos+2>=cek.length)
      {
        alert("Email yang dimasukkan tidak valid");
        return false;
      }
	  else{
		return true;
	  }
	}	
	function getXmlHttpRequest(){
		var xmlHttpObj;
		if (window.XMLHttpRequest){
			xmlHttpObj = new XMLHttpRequest();
		}
		else{
			try{
				xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e){
				try{
					xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					xmlHttpObj = false;
				}
			}
		}
		return xmlHttpObj;
	}
</script>

</div>
<script type="text/javascript" src="validasitanggal.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>