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

<title>Simple Blog | Apa itu Simple Blog?</title>

</head>

<body class="default">

<?php
//create connection
$con=mysqli_connect("localhost","root","asdasd123","blog");

//check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

$id_post = $_GET['id_post'];
$result = mysqli_query($con, "SELECT * FROM post WHERE id_post = '$id_post'");
$row = mysqli_fetch_array($result);

$result_komentar = mysqli_query($con, "SELECT * FROM comment WHERE id_post = '$id_post'");

?>

<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><img src="assets/img/blogicon.png"></a>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner">
            <time class="art-time"><?php echo $row['tanggal']; ?></time>
            <h2 class="art-title"><?php echo $row['judul']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $row['content']; ?></p>
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="" id="myForm" >
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="button" name="submit" value="Kirim" class="submit-button" onclick="return Validatemail()">
                </form>
            </div>

            <ul class="art-list-body">
            <div id="myDiv">
            <?php
            while($row_komentar = mysqli_fetch_array($result_komentar)) { ?>
                <li class="art-list-item">
                    <div class="art-list-item-title-and-time">
                        <h2 class="art-list-title"><a href="post.php?id_post=<?php echo $row['id_post'];?>"><?php echo $row_komentar['nama'];?></a></h2>
                        <div class="art-list-time"><?php echo $row_komentar['waktu'];?>
                        </div>
                    </div>
                    <p><?php echo $row_komentar['komentar'];?></p>
                </li>

            <?php
            } ?>   
            </div> 
            </ul>
        </div>
    </div>
<script>
function Validatemail() {
    var x = document.forms["myForm"]["Email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Alamat e-mail tidak valid");
        return false;
    } else {
        addcomment();
        document.getElementById("Nama").value = "";
        document.getElementById("Email").value = "";
        document.getElementById("Komentar").value = "";
    }
}

function addcomment() {
	var Nama = document.getElementById("Nama").value;
	var Email = document.getElementById("Email").value;
	var Komentar = document.getElementById("Komentar").value;
	var xmlhttp;
	if (window.XMLHttpRequest) {// kode untuk IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else {// kode untuk IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function() {
 		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            window.scrollTo(0,document.body.scrollHeight);
    	}
	}
	xmlhttp.open("GET","add_comment.php?id="+<?php echo $row['id_post'];?>+"&Nama="+Nama+"&Email="+Email+"&Komentar="+Komentar,true);
	xmlhttp.send();
} 
</script>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <aside class="offsite-links">
    <a href="https://twitter.com/vidianindhita"><img src="assets/img/twitter.png"></a>
    <a href="https://www.facebook.com/vanindhita"><img src="assets/img/facebook.png"></a>
    </aside>
</footer>

</div>
</body>
</html>