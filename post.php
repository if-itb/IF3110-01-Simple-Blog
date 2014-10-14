<!DOCTYPE html>
<html>
<head>
<?php
	date_default_timezone_set('Asia/Jakarta');
	$username = "root";
	$password = "";
	$db = "simpleblog";
	$con = mysqli_connect('localhost', $username, $password,$db) or die("Unable to connect to MySQL");	
	$query = "SELECT * FROM `post` WHERE PostID =".$_GET['id'];
	$q_result = mysqli_query($con,$query) or die("Unable to execute query");
	$row = mysqli_fetch_array($q_result);
	
	$query = "SELECT * FROM `comments` WHERE PostID =".$_GET['id'];
	$q_result = mysqli_query($con,$query) or die("Unable to execute query");
	
	function write_date($date) 
	{
		$num_to_mon = array(
			"01" => "Januari",
			"02" => "Februari",
			"03" => "Maret",
			"04" => "April",
			"05" => "Mei",
			"06" => "Juni",
			"07" => "Juli",
			"08" => "Agustus",
			"09" => "September",
			"10" => "Oktober",
			"11" => "November",
			"12" => "Desember"
		);					
		$splitted = explode("-",$date);
		$result = $splitted[2]." ".$num_to_mon[$splitted[1]]." ".$splitted[0];
		echo $result;
	}
	
	function get_dif($d1,$date2)
	{
		$res = "";
		$date1 = new DateTime($d1);
		//$date2 = new DateTime($dn);
		$dif = $date2->diff($date1);
		if($dif->y > 0) $res = $dif->y." tahun lalu";
		else if($dif->m > 0) $res = $dif->m." bulan lalu";
		else if($dif->d > 0) $res = $dif->d." hari lalu";
		else if($dif->h > 0) $res = $dif->h." jam lalu";
		else if($dif->i > 0) $res = $dif->i." menit lalu";
		else if($dif->s > 0) $res = $dif->s." detik lalu";
		return $res;
	}
?>
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

<title><?php echo "Simple Blog : ".$row['Title']?></title>

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
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;" id="title">
            <time class="art-time"><?php echo write_date($row['Date'])?></time>
            <h2 class="art-title"><?php echo $row['Title']?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $row['Content']?></p>

            <hr />	
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form name="kirim_kom" method="post">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick=<?php echo "\"return update_kom(".$_GET['id'].")\""?>>
                </form>
            </div>
			<div id="comments">
				<ul class="art-list-body" id="loop">
					<?php
						$com_arr = array();
						while($com_row = mysqli_fetch_array($q_result))
						{
							array_unshift($com_arr,$com_row);
						}
						foreach($com_arr as $com_row)
						{?>
							<li class="art-list-item">
								<div class="art-list-item-title-and-time">
									<h2 class="art-list-title"><a href=<?php echo "mailto:".$com_row['Email']?>><?php echo $com_row['Name']?></a></h2>
									<div class="art-list-time"><?php $now=new DateTime(); echo get_dif($com_row['Date'],$now)?></div>
								</div>
								<p><?php echo $com_row['Content']?></p>
							</li>
					<?php }?>
				</ul>
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
      
      
	function is_com_validate() {
		var nama = document.forms["kirim_kom"]["Nama"].value;
		var email = document.forms["kirim_kom"]["Email"].value;
		var kom = document.forms["kirim_kom"]["Komentar"].value;
		if (nama==null || nama=="" || email==null || email=="" || kom==null || kom=="") 
		{
			alert("Pastikan semua form telah diisi");
			return false;
		}
		var n = email.search("[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}");
		if (n==-1)
		{
			alert("Cek kembali email yang diinput");
			return false;
		}
		return true;
	}
	
	function update_kom(id)
	{
		var ajaxRequest; 
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		}catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			}catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				}catch (e){
					alert("Maaf, browser Anda tidak mendukung layanan AJAX");
					return false;
				}
			}
		}
		if (is_com_validate())
		{
			var nama = document.forms["kirim_kom"]["Nama"].value;
			var email = document.forms["kirim_kom"]["Email"].value;
			var kom = document.forms["kirim_kom"]["Komentar"].value;
			var req = "id="+id+"&Nama="+nama+"&Email="+email+"&Komentar="+kom;
			
			ajaxRequest.onreadystatechange=function()
			{
				if (ajaxRequest.readyState==4 && ajaxRequest.status==200)
				{
					var ret =  ajaxRequest.responseText;
					document.getElementById("comments").innerHTML = ret+document.getElementById("comments").innerHTML;
				}
			}
			ajaxRequest.open("POST","comment_submitter.php",true); 
			ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajaxRequest.send(req);
		}
		return false;
	}
</script>

</body>
</html>
