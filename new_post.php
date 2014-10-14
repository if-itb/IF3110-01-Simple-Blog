<?PHP
include("db_con.php");
include("getallposts.php");

if(!empty($_GET['id'])){
	$querytype = 1;
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

<title>Sima Blog | Tambah Post</title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Sima<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>
			<div id="contact-area">
                <form method="post" onSubmit="return checkDate()" action="db_post.php?querytype=<?PHP if(isset($querytype))echo $querytype; ?>&id=<?PHP if(isset($_GET['id']))echo $_GET['id']?>">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="judul" value="<?PHP if(isset($row))echo $row['judul_post']; ?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="tanggal" value="<?PHP if(isset($row))echo $row['tanggal_post']; ?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="konten"><?PHP if(isset($row))echo $row['konten_post']; ?></textarea>

                    <input type="submit" name="submit" value="Simpan Post" class="submit-button">
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
function checkDate(){
	var date = new Date();
	var tanggalNow = date.getDate();
	var bulanNow   = date.getMonth() + 1;
	var tahunNow   = date.getFullYear();
	var tanggalInput = document.getElementById("tanggal").value.substring(0,2);
	var bulanInput	 = document.getElementById("tanggal").value.substring(3,5);
	var tahunInput	 = document.getElementById("tanggal").value.substring(6,10);
	var firstDash  = document.getElementById("tanggal").value.substring(2,3);
	var secondDash = document.getElementById("tanggal").value.substring(5,6);
	
	if(firstDash == '-' && secondDash == '-'){
		if(tahunInput >= tahunNow){
			if(bulanInput >= bulanNow){
				if(tanggalInput >= tanggalNow){
					return true;
				}
			}
		}
		else{
			alert("Tanggal yang Anda masukkan salah");
			return false;
		}
	}
	else{
		alert("Format tanggal yang benar adalah DD-MM-YYYY");
		return false;
	}
}
</script>

</body>
</html>