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
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
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
                <form name="buat_post" method="post" action="post_submitter.php" onsubmit="return is_date_valid()">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" placeholder="Ex: '08 Agustus 2014' atau '08 08 2014'">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"></textarea>

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
   
   function conv_date(str)
   {
	   var conv_arr = {
		 "Januari"  : "01",
		 "Februari" : "02",  
		 "Maret"    : "03",  
		 "April"    : "04",  
		 "Mei"      : "05",  
		 "Juni"     : "06",  
		 "Juli"     : "07", 
		 "Agustus"  : "08",  
		 "September": "09",  
		 "Oktober"  : "10",
		 "November" : "11",  
		 "Desember" : "12",  
		 "01" : "01",
		 "02" : "02",  
		 "03" : "03",  
		 "04" : "04",  
		 "05" : "05",  
		 "06" : "06",  
		 "07" : "07",  
		 "08" : "08",  
		 "09" : "09",   
		 "10" : "10",
		 "11" : "11",  
		 "12" : "12",
	   };
	   return conv_arr[str];
   }
   function to_date_type(str)
   {
	   var conv_arr = {
		 "01"  : "January",
		 "02"  : "February",  
		 "03"  : "March",  
		 "04"  : "April",  
		 "05"  : "May",
		 "06"  : "June",  
		 "07"  : "July",  
		 "08"  : "August", 
		 "09"  : "September",  
		 "10"  : "October",  
		 "11"  : "November",
		 "12"  : "December"
	   };
	   return conv_arr[str];
   }
   function is_date_valid()
   {
	   
	   var form_in_date = document.forms["buat_post"]["Tanggal"].value;
	   var judul = document.forms["buat_post"]["Judul"].value;
	   var konten = document.forms["buat_post"]["Konten"].value;
	   if (form_in_date==null || form_in_date=="" || judul==null || judul=="" || konten==null || konten=="") 
	   {
			alert("Pastikan semua form telah diisi");
			return false;
	   }
	   var date_arr = form_in_date.split(" ");
	   var res = date_arr[0] + "/" + conv_date(date_arr[1]) + "/" + date_arr[2];
	   var regex = /(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))/;
	   if(!res.match(regex)) 
	   {
		   alert("Tanggal yang diinput tidak valid atau tidak dalam format yang benar. Silakan input kembali");
		   return false;
	   }
	   var in_month = to_date_type(conv_date(date_arr[1]));
	   var s_date = in_month+" "+date_arr[0]+" "+date_arr[2];
	   var in_date = new Date(s_date);
	   var now_date = new Date();
	   if (in_date > now_date)
	   {
			alert("Apakah Anda datang dari masa depan? Tidak? Silakan input kembali tanggal");	   
			return false;
	   }
   }
</script>

</body>
</html>
