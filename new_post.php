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

<img src="assets/img/Subtle_Ocean.jpg" class="background">

<?php
    $con = mysqli_connect("localhost","root","","tugaswbd1");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySql";
    }

    //initialize
    $modif = false;
    $idCurrent = $judul = $tanggal = $konten = "";

    if(isset($_GET['id'])){
        $idCurrent = $_GET['id'];
        $postValue = mysqli_query($con, "SELECT * FROM post where post_id = $idCurrent");
        $row = mysqli_fetch_array($postValue);
        $judul = $row['post_judul'];
        $tanggal = $row['post_tanggal'];
        $konten = $row['post_konten'];
        $modif = true;
    }

?>

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
                <form method="post" action="index.php?id=<?=$idCurrent;?>&modif=<?=$modif;?>" onsubmit = "return validateDate();" name="myForm">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" required  value = "<?php echo $judul;?>" >

                    <label for="Tanggal">Tanggal:</label>
                    <input type="Date" name="Tanggal" id="Tanggal" required value = <?php echo $tanggal;?> >
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php echo $konten;?> </textarea>

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="#">Back to top</a></div>
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

   function validateDate(){
      var inputDate = document.forms["myForm"]["Tanggal"].value + "-";
      var inputYear=""; var inputMonth=""; var inputDay="";
      var i = 0;
      
      while(inputDate.charAt(i) !='-'){
        inputYear = inputYear + inputDate.charAt(i);
        i++;
      }
      i++;
      while(inputDate.charAt(i) !='-'){
        inputMonth = inputMonth + inputDate.charAt(i);
        i++;
      }
      i++;
      while(inputDate.charAt(i) !='-'){
        inputDay = inputDay + inputDate.charAt(i);
        i++;
      }
      var formDate = new Date();
      formDate.setFullYear(inputYear,inputMonth-1,inputDay);
      //formDate.setHours(23);
      //formDate.setMinutes(59);
      //formDate.setSeconds(59);
      var cekDate = new Date();
      if(formDate < cekDate){
            alert("Tanggal post tidak boleh lebih kecil dari hari ini");
            return false;
       }
   }
</script>

</body>
</html>