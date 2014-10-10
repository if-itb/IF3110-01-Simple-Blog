<?php 
    include_once 'DBConfig.php';
	if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysql_query("select * from entries where PID='$id'");
        while($row = mysql_fetch_array($result)) {
          	$Judul = $row['JUDUL'];
    	    $Tanggal = $row['TANGGAL'];
    	    $Konten = $row['KONTEN'];
        }
    }
    else {
        echo "No id";
    }
?>

<?php
	if(isset($_POST['simpan']))
	{
        $id = $_POST['id'];
		$Judul=$_POST['Judul'];
		$Tanggal=$_POST['Tanggal'];
		$Konten=$_POST['Konten'];
	    if(empty($Judul) || empty($Tanggal) || empty($Konten))
		{
			if(empty($Judul))
			{
				echo "<font color='red'>Judul harus diisi.</font><br/>";
			}
			if(empty($Tanggal))
			{
				echo "<font color='red'>Tanggal harus diisi.</font><br/>";
			}
			if(empty($Konten))
			{
				echo "<font color='red'>Konten harus diisi.</font><br/>";
			}			
			
		}	
		else
		{	
			$timestamp = strtotime($Tanggal);
			$date = date('Y-m-d', $timestamp);
            $fdate = "FROM_UNIXTIME($timestamp)";
        	//$result=mysql_query("UPDATE `entries` SET `JUDUL`='$Judul',`TANGGAL`=FROM_UNIXTIME($timestamp),`KONTEN`='$Konten' WHERE PID='$id');
            $result=mysql_query("UPDATE entries SET JUDUL='$Judul',TANGGAL='$Tanggal',KONTEN='$Konten' WHERE PID=$id");
            header('Location: index.php');
            mysql_close($link);
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

<title> AYE! | Edit Post</title>


</head>

<body class="default">
    <div class="wrapper">

        <nav class="nav">
            <a style="border:none;" id="logo" href="index.php"><h1> AYE! </h1></a>
            <ul class="nav-primary">
                <li><a href="new_post.html">+ Tambah Post</a></li>
            </ul>
        </nav>

        <article class="art simple post">
            
            
            <h2 class="art-title" style="margin-bottom:40px">-</h2>

            <div class="art-body">
                <div class="art-body-inner">
                    <h2>Edit Post</h2>

                    <div id="contact-area">
                        <form method="post" action="edit_post.php?">
                            <label for="Judul">Judul:</label>
                            <input type="text" name="Judul" id="Judul" value=<?php echo "'$Judul'";?>>

                            <label for="Tanggal">Tanggal:</label>
                            <input type="date" name="Tanggal" id="Tanggal" value=<?php echo $Tanggal;?>>
                            
                            <label for="Konten">Konten:</label><br>
                            <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $Konten;?></textarea>
                            <input type="hidden" name="id" value=<?php echo $id;?>>  
                            <input type="submit" name="simpan" value="simpan" class="submit-button">
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

</body>
</html>