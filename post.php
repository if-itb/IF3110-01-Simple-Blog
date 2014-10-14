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

<title>Simple Blog | Apa itu Simple Blog?</title>

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
    <?php
    $host     = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "if3110-01";

    $conection = mysqli_connect($host,$username,$password,$dbname);


    $id_post = $_GET['id_post'];
    if (is_null($id_post)) {
        die("id_post not supplied you should supply the id post number as parameter");
    }

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($conection, "SELECT * from post where id_post=".$id_post);
    while($row = mysqli_fetch_array($result)){?>

    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?=$row['tanggal']?></time>
            <h2 class="art-title"><?=$row['judul']?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>


    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?=$row['konten']?>

            <hr />
            <?php
            }
            ?>        
            <h2>Komentar</h2>

            <div id="contact-area">
                <!-- //<form method="post"> -->
                    <label for="Nama">Nama:</label>
                    <input type="text" name="nama" id="nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="email" id="email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="komentar" rows="20" cols="20" id="komentar"></textarea>

                    <input type="submit" name="submit" value="Simpan" onclick="return send_comment();" class="submit-button">
                    <button onclick="return load_comment();">Test</button>
                <!-- </form> -->
            </div>

            <ul class="art-list-body" id="listkomentar">
            <?php
            $result_komentar = mysqli_query($conection,"SELECT * from komentar where id_post=".$id_post);
            while ($row_komentar = mysqli_fetch_array($result_komentar)) {?>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php?id_post=<?=$id_post?>"><?=$row_komentar['nama']?></a></h2>
                        <div class="art-list-time"><?=$row_komentar['waktu']?></div>
                    </div>
                    <?=$row_komentar['konten']?>
                </li>

            <?php
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
<script>


function submit_button(){
	alert("test");
}

function validate_email(email){
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    return pattern.test(email);
}

function validate_nama(nama){
    return (!nama || /^\s*$/.test(nama));
}

function validate_konten(konten){
    return (!konten || /^\s*$/.test(konten));
}



function send_comment()
{
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	var id_post = <?php echo $id_post;?>;
	var nama = document.getElementById('nama').value;
	var email = document.getElementById('email').value;
	var konten = document.getElementById('komentar').value;

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			alert(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET","ajax_addcomment.php?nama="+nama+"&email="+email+"&konten="+konten+"&id_post="+id_post,true);
	xmlhttp.send();
}

function load_comment(){
	var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			var hasil = xmlhttp.responseText;
			var the_jsons = JSON.parse(hasil);
			
			var container = document.getElementById('listkomentar');
			
			var out_string ="";
			for (var i = the_jsons.length - 1; i >= 0; i--){
				var id_komentar = the_jsons[i].id_komentar;
				var nama        = the_jsons[i].nama;
				var waktu       = the_jsons[i].waktu;
				var email       = the_jsons[i].email;
				var konten      = the_jsons[i].konten;
				alert(JSON.parse(the_jsons[i]));
				out_string = out_string + printthecoment(id_komentar,nama,email,waktu,konten);
			}
			console.log(out_string);
			container.innerHTML = out_string;
			//alert(out_string);
			// inner html set to  string;
			// var the_json = JSON.parse(hasil);
			// for (var i = the_json.length - 1; i >= 0; i--) {
			// 	console.log(the_json[i])
			// }
		}
	}
	xmlhttp.open("GET","ajax_loadcomment.php?id_post=<?php echo $id_post;?>",true);
	xmlhttp.send();	
}

function printthecoment(id,nama,email,waktu,konten){
	 var output = "";
	 alert(konten);
	output = '<li class="art-list-item">'+
                     '<div class="art-list-item-title-and-time">'+
                         '<h2 class="art-list-title"><a href="flagkomentar.php?id_post='+id+'">'+nama+'</a></h2>'+
                         '<div class="art-list-time">'+waktu+'</div>'+
                     '</div>'+
                     +konten+
                 '</li>';
    return output;
}
</script>

</body>
</html>