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

<?php include "koneksi.php"; 
	$id = $_GET['id'];
	$query = mysql_query("SELECT * FROM `tblblog` WHERE `id`='$id' ");
	$post = mysql_fetch_array($query);
	
?>
<title>Simple Blog | <?php echo $post['judul']; ?></title>


</head>

<body class="default" onload="return loadComment()">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.html"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $post['tanggal']; ?></time>
            <h2 class="art-title"><?php echo $post['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $post['konten']?></p>

            <hr />
            
            <h2>Komentar</h2>
			<?php 
				if(!empty($_GET['message']) && $_GET['message'] == 'success')
				{	echo '<h6>Berhasil menambah komentar!</h6>';
					}
			?>
            <div id="contact-area">
                <form name="myForm" method="post" onsubmit="return false;" >
					<input type="hidden" name="id" value="<?php echo $post['id']; ?>" >
                    
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
					<label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button" onclick="insertComment();">
                </form>
            </div>
				<ul class="art-list-body">
					<div id="loadkomen"></div>				
					<div id="inputkomentar"></div>
				<?php 
				/*include ('koneksi.php'); 

				$query = mysql_query("select * from komentar where id_post='$id' ");
				
				while ($data = mysql_fetch_array($query)){
				  echo  '<li class="art-list-item">';
				  echo      '<div class="art-list-item-title-and-time">';
				  echo          '<h2 class="art-list-title"><a href="post.html">'. $data["Nama"] .'</a></h2>';
				  echo          '<div class="art-list-time">2 menit lalu</div>';
				  echo      '</div>';
				  echo      '<p>'. $data["Komentar"].'</p>';
				  echo  '</li>';
				 }*/ 
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
 <script type="text/javascript"> /* function validateForm(){
	var x = document.forms["myForm"]["Email"].value;
	//var x = document.forms.myForm.Email.value;	
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
			alert("Not a valid e-mail address");
			//document.myForm.Email.focus();
			return false;
		}
}
	 //return ( true ); */
</script> 
<script type="text/javascript" src="komen.js"></script>
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
