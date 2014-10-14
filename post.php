<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="icon" type="image/png" href="Aang.png">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php
	$con=mysqli_connect("localhost","root","","datapost");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .mysql_conneect_error();
	}
	$IDp = $_GET['id'];
	$result = mysqli_query($con,"SELECT * FROM postingan WHERE IDpost = $IDp");
	while($row = mysqli_fetch_array($result)) {
	$Judul = $row['Judul'];
	$Tanggal = $row['Tanggal'];
	$Konten = $row['Konten'];
	}
?>

<title>Just Blog | <?php echo $Judul?></title>

</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><img id="aang" src="Aang.png" /></a>
    <ul class="nav-primary">
        <div id="hed">
        <li><a>__Post__</a></li>
            
        <a href="new_post.php"><img id="addico" src="plus.png" /></a>
     </div>
    </ul>
    
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $Tanggal?></time>
            <h2 class="art-title"><?php echo $Judul?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $Konten?></p>

            <hr />
            
            <h2>Komentar</h2>
            <div id="contact-area">
                <form method="post" id="komen" name="komen" onsubmit="sendkomen();return false;">
                    
                    <input type="text" name="Nama" id="Nama" placeholder="Nama Kamu">
        
                    <input type="text" name="Email" id="Email" onchange="return validateEmail()" placeholder="Email Kamu">
                    
                    <br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar" placeholder="Apa yang Kamu Pikirkan Tentang Post ini?"></textarea>
                    <input type="submit" name="submit" onclick="return validateEmail();" value="Kirim" class="submit-button">
                </form>
            </div>
			<ul class="art-list-body">
				<div id="listkomen">
			<?php 
				$result = mysqli_query($con,"SELECT * FROM komentar WHERE idpost = $IDp ORDER BY date DESC");	
				while($row = mysqli_fetch_array($result)){ 
			?>
					<li class="art-list-item">
						<div class="art-list-item-title-and-time">
							<h2 class="art-list-title"><a><?php echo $row['Nama']?></a></h2>
							<div class="art-list-time"><?php echo $row['date']?></div>
						</div>
						<p><?php echo $row['Komentar']?></p>
					</li>
			<?php } ?>
				</div>
			</ul>
        </div>
    </div>

</article>
<?php mysqli_close($con);?>
</div>
<script type="text/javascript"> 
function sendkomen(){
	var name = document.forms["komen"]["Nama"].value;
	var email = document.forms["komen"]["Email"].value;
	var komentar = document.forms["komen"]["Komentar"].value;
	
	
	var datastr = "name="+ name + "&email=" + email + "&komentar=" + komentar + "&idpost=<?php echo $IDp?>";
	var xmlhttp;
	
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET","postkomen.php?"+ datastr ,true);
	xmlhttp.send();
	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{       
				document.getElementById("listkomen").innerHTML = xmlhttp.responseText + document.getElementById("listkomen").innerHTML;
			}
	  }
}
</script>
<script type="text/javascript"> 
function validateEmail() {
	var email = document.forms["komen"]["Email"].value;
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var result = email.match(re);
	if (result !=null){alert("benar");}
	else
	{alert("salah"); return false;}
}
</script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>