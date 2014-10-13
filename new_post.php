<!DOCTYPE html>
<html>
<head>
<?php
ob_start(); 
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

    <div class="art-header">
        <div class="art-body-inner">
            <h2 class = "art-title-add-post" >Tambah Post</h2 >

            <div id="contact-area">
                <form name = "formAdd" method="post" action="" onSubmit= " return showValidate()">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" >
                    
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
        Edited by /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://facebook.com/daniar.h.kurniawan">Daniar Heri Kurniawan</a> /
        <br>
        
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


function showValidate() {
    var txt;
    var valid = false;

    var x = document.forms["formAdd"]["Konten"].value;
    var y = document.forms["formAdd"]["Tanggal"].value;
    var z = document.forms["formAdd"]["Judul"].value;
    if (x==null || x=="" || y==null || y=="" || z==null || z=="") {
        alert("Maaf, semua form harus terisi!");
        return false;
    }else {
        //mm/dd/yyyy
        var arr = y.split("-");  
        var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
        var date = arr[1]+"/"+(arr[0])+"/"+arr[2];
        if (isValidDate(date)){
            return true;
        }else{
            alert("Maaf, format input tanggal seharusnya DD-MM-YYYY! ");
            return false;
        }
    }
}
function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};
</script>

</body>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $con=mysqli_connect("localhost","root","","simple_blog_db");
        $judul = $_REQUEST['Judul']; 
        $tanggal = $_REQUEST['Tanggal']; 
        $konten = $_REQUEST['Konten']; 

        $sql = "INSERT INTO tabel_post (No, Judul, Tanggal, Konten) VALUES(NULL,'$judul','$tanggal','$konten')";

        mysqli_query($con,$sql);
        mysqli_close($con);

        $url = "Location: index.php";
        header($url);
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ob_end_flush(); 
?>
<SCRIPT LANGUAGE="JavaScript">
    var now = new Date();

    var days = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    
    var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();

    function fourdigits(number) {
        return (number < 1000) ? number + 1900 : number;
                                    }
    today =   date + "-" +(now.getMonth()+1) + "-" +
             (fourdigits(now.getYear())) ;
    document.getElementById("Tanggal").value = today;


    </script>
</html>