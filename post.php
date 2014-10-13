<?php
session_start();

if (isset($_POST["submit"])){
    if ($_POST["formid"] == $_SESSION["formid"]){
        $_SESSION["formid"] = '';
        processForm();
    }
}else{
    $_SESSION["formid"] = md5(rand(0,10000000));
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
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <?php
                $con=mysql_connect("localhost","root","","simple_blog_db");
                $nomor = $_GET['Nomor'];
                mysql_select_db("simple_blog_db", $con);
                $sql = "SELECT * FROM tabel_post WHERE No = ".$nomor.";";
                $result = mysql_query($sql);
                $row = mysql_fetch_row( $result );
                echo "<time id = \"showTanggal\" class=\"art-time\">",$row[3],"</time>";
                echo "<h2 class=\"art-title\">",$row[1],"</h2>";
            ?>
            <script type="text/javascript">
                var Tgl = document.getElementById("showTanggal").innerHTML;
                var arr = Tgl.split("-"); 
                var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
                var date = arr[0]+" "+months[arr[1]-1]+" "+arr[2];
                document.getElementById("showTanggal").innerHTML = date;
            </script>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <?php
                echo "<p>",nl2br($row[2]),"</p>";
                mysql_close($con);
            ?>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form id = "formKomentar" method="post" action=""  onSubmit= " return showValidate()">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
    
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="hidden" name="formid" value="<?php echo $_SESSION["formid"]; ?>" />
                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id = "komentar">
                <?php
                    $textKomentar = getKomentar();
                    echo $textKomentar;
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

    function updateKomentar(){
        var txtFile = new XMLHttpRequest();
        txtFile.open("GET", "updatedKomentar.txt", true);
        txtFile.onreadystatechange = function() {
          if (txtFile.readyState === 4) {  // Makes sure the document is ready to parse.
            if (txtFile.status === 200) {  // Makes sure it's found the file.
              allText = txtFile.responseText; 
              document.getElementById("komentar").innerHTML = allText; 
              lines = txtFile.responseText.split("\n"); // Will separate each line into an array
            }
          }
        }
        txtFile.send(null);
    }

function showValidate() {
    var txt;
    var valid = false;

    var nama = document.forms["formKomentar"]["Nama"].value;
    var email = document.forms["formKomentar"]["Email"].value;
    var komentar = document.forms["formKomentar"]["Komentar"].value;
    if (nama==null || nama=="" || email==null || email=="" || komentar==null || komentar=="") {
        alert("Maaf, semua form harus terisi!");
        return false;
    }else {
        if (validateEmail(email)){
            return true;
        }else{
            document.forms["formKomentar"]["Email"].value = "";
            alert("Maaf, email tidak valid! ");
            return false;
        }
    }
}
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
</script>

</body>


<?php 
function processForm(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $con=mysqli_connect("localhost","root","","simple_blog_db");
        $nama = $_REQUEST['Nama']; 
        $email = $_REQUEST['Email']; 
        $komentar = $_REQUEST['Komentar']; 
        $waktu = date("Y m d h i s a"); ;
        $nomor = $_GET['Nomor'];
        $sql = "INSERT INTO tabel_comment (NoUrut,NoArtikel, Nama, Email, Komentar,Waktu) VALUES(NULL,'$nomor','$nama','$email','$komentar','$waktu')";
        
        mysqli_query($con,$sql);
        mysqli_close($con);

        $text = getKomentar();
        $myfile = fopen("updatedKomentar.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $text);
        fclose($myfile);
        echo "<script> updateKomentar()</script>";
        $_SESSION["formid"] = md5(rand(0,10000000));
    }
}
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    function getKomentar(){
        $con=mysql_connect("localhost","root","","simple_blog_db");
        $nomor = $_GET['Nomor'];
        mysql_select_db("simple_blog_db", $con);
        $sql = "SELECT * FROM tabel_comment WHERE NoArtikel=$nomor";
        $result = mysql_query($sql);
        $txt="";  
        $textKomentar = "";
        while($row = mysql_fetch_array( $result )) {
            $time = "";
            $time = getRecentTime($row['Waktu']);
            $textKomentar .=  "<li class=\"art-list-item\">";
            $textKomentar .=    "<div class=\"art-list-item-title-and-time\">";
            $textKomentar .=       " <h2 class=\"art-list-title\"><a href=\"post.php?Nomor=".$nomor."\">".$row['Nama']."</a></h2>";
            $textKomentar .=       " <div class=\"art-list-time\">".$time."</div>";
            $textKomentar .=    "</div>";
            $textKomentar .=  " <p>".$row['Komentar']."</p>";
            $textKomentar .= "</li>";
        }
        mysql_close($con);
        return $textKomentar;
        
    }
    function getRecentTime($lastTime){
        $waktuNow = date("Y m d h i s a");
        $Past = explode(" ",$lastTime);
        $Now = explode(" ",$waktuNow);
        if($Past[6]=="pm")
            $Past[2] += 12;
        if($Now[6]=="pm")
            $Now[2] += 12;
        $n = 0 ;
        $ketemu = false;
        while($n < 6 && !$ketemu)
        {
            $selisih = 0;
            $selisih = $Now[$n]-$Past[$n];
            if($selisih > 0){
                $ketemu = true;
            } else{
                $n++;
            }
        }
        $type = [" tahun", " bulan", " hari", " jam", " menit", " detik"];
        return ($selisih . $type[$n] . " yang lalu");
    }


?>



</html>