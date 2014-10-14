<?php
function printifexist($var){
    if(isset($var)){
        echo $var;
    }
}

function print_action(){
    if( isset($_GET['action']) && ($_GET['action']=='edit')){
        echo "edit";
    }else{
        echo "new";
    }
}
if(isset($_GET['action']) && ($_GET['action']=='edit') && isset($_GET['id_post'])){
    $host     = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "if3110-01";

    $conection = mysqli_connect($host,$username,$password,$dbname);
    $query  = "SELECT * from post where id_post=".$_GET['id_post'];
    $result = mysqli_query($conection, $query);
    while($row = mysqli_fetch_array($result)){
        $judul = $row['judul'];
        $tgl = explode("-", $row['tanggal']);
        $tanggal = $tgl[2]."-".$tgl[1]."-".$tgl[0];
        $konten = $row['konten'];
    }
    mysqli_close($conection);
}else{
    $judul="";
    $tanggal = "";
    $konten = "";
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
                <form method="post" action="new_post_action.php">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value="<?php printifexist($judul)?>">

                    <label for="Tanggal">Tanggal:</label>
                    <input type="text" name="Tanggal" id="Tanggal" value="<?php printifexist($tanggal)?>">
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten"><?php printifexist($konten);?></textarea>
                    <input type="hidden" name="id_post" value="<?php echo isset($_GET['id_post']) ? $_GET['id_post'] : ""?>">
                    <input type="hidden" name="action" value="<?php print_action();?>">
                    <input type="submit" name="submit" value="Simpan" onclick="return validate();" class="submit-button">
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

<script type="text/javascript" src="includes/utama.js"></script>
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
<script type="text/javascript">

function validateFormatTanggal(str) {
	var a = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;
	return a.test(str);
}

function get_tgl_skrg(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd='0'+dd
	} 

	if(mm<10) {
		mm='0'+mm
	} 

	today = yyyy+'-'+mm+'-'+dd;
	return today;
}

function validateWaktuTanggal(str){
	var arr = str.split("-");
	var input_tgl = new Date(arr[2]+"-"+arr[1]+"-"+arr[0]);
	var skrang = new Date(get_tgl_skrg());
	return +input_tgl >= + skrang;
}


function validate(){
    var judul = document.getElementById("Judul").value;
    var tanggal = document.getElementById("Tanggal").value;
    var konten = document.getElementById("Konten").value;
    if((judul != '' ) && (tanggal != '' ) && (konten != '' )){
        if(validateFormatTanggal(tanggal)){
            if(validateWaktuTanggal(tanggal)){
                alert(judul+tanggal+konten);
            }else{
                alert("Waktu yang diinput minimal sama dengan hari ini atau lebih dari ini");
                return false;
            }
        }else{
            alert("ga valid tanggalnya formatnya")
            return false;
        }
    }else{
        alert("kosong coy");
        return false;
    }
    
}
</script>
</body>
</html>