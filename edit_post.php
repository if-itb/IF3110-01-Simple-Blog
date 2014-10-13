<?php
	$pid = $_GET["postid"];
	mysql_connect("localhost","root","");
	@mysql_select_db("simpleblog") or die( "Unable to select database");
	$query = "SELECT * FROM post WHERE idpost=".$pid;
	$result = mysql_query($query);
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
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Riady's Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.html">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form method="post" onsubmit="return validate();" action="post_handler.php?action=edit&pid=
				<?php
					echo $pid;
				?>
				">
                    <label for="Judul">Judul:</label>
					<?php
						$judul = mysql_result($result,0,"judul");
						echo '<input type="text" name="Judul" id="Judul" value="'.$judul.'">';
					?>
                    

                    <label for="Tanggal">Tanggal:</label>
					<?php
						$tanggal = mysql_result($result,0,"tanggal");
						echo '<input type="text" name="Tanggal" id="Tanggal" value="'.$tanggal.'">';
					?>
                    
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php
						$konten = mysql_result($result,0,"konten");
						echo $konten;
					?></textarea>

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
        Riady 13512024
        
    </aside>
</footer>

</div>

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
<script>
function validateDate(){
		var valid = true;
		var tgl = document.getElementById("Tanggal").value;
		if(tgl.length<10){
			alert("Masukan format tanggal yang benar");
			valid = false;
		}
		else{
			if((tgl.charAt(4)!='-')||(tgl.charAt(7)!='-')){
				alert("Masukan format tanggal yang benar");
				valid = false;
			}
			else if( (tgl.charAt(5)>1) ||( (tgl.charAt(5)==1) && (tgl.charAt(6)>2) )){
				alert("Bulan tidak boleh lebih dari 12");
				valid = false;
			}
			else if( (tgl.charAt(8)>3) ||( (tgl.charAt(8)==3) && (tgl.charAt(9)>1) )){
				alert("Tanggal tidak boleh lebih dari 31");
				valid = false;
			}
			else{
				var dateInput = tgl.substr(8,2);
				var monthInput = tgl.substr(5,2);
				var yearInput = tgl.substr(0,4);
				var d = new Date();
				var date = d.getDate();
				var month = d.getMonth() + 1;
				var year = d.getFullYear();
				if(yearInput < year){
					alert("Masukan tanggal tidak boleh sebelum sekarang");
					valid = false;
				}
				else if(yearInput == year){
					if(monthInput < month){
						alert("Masukan tanggal tidak boleh sebelum sekarang");
						valid = false;
					}
					else if(monthInput == month){
						if(dateInput < date){
							alert("Masukan tanggal tidak boleh sebelum sekarang");
							valid = false;
						}
					}
				}
			}
		}
		return valid;
	}
	function validate(){
		var judul = document.getElementById('Judul').value;
		var tgl = document.getElementById('Tanggal').value;
		var konten = document.getElementById('Konten').value;
		if(judul.length==0 || tgl.length==0 || konten.length==0){
			alert('Ada form yang masih kosong');
			return false;
		}
		else{
			return validateDate();
		}
	}
</script>
</body>
</html>