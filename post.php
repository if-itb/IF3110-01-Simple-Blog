<?php
	include "mysql.php";
	$table = "ENTRIES";
	$sql = "SELECT * from $table WHERE ID= '$_GET[id]'";
	$result = @mysql_query($sql);
	$row = @mysql_fetch_array($result);
?>

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

<?php echo "<title>".$row['TITLE']."</title>" ?>


</head>

<body class="default" onload = "panggilcomment()">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
    <ul class="nav-primary">
        <li><a href = "new_post.php?id=0">+ Tambah Post</a></li>
    </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
           <?php echo" <time class='art-time'>".$row['TANGGAL']."</time>"?>
           <?php echo" <h2 class='art-title'>".$row['TITLE']."</h2>"?>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <?php echo "<p>".$row['CONTENT']."</p>" ?>
            
            <h2>Komentar</h2>

            <div id="contact-area">
				
                <form name="form1" method="post" onsubmit="commentfunction(); return false">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="nama" id="nama" required>
        
                    <label for="Email">Email:</label>
                    <input type="text" name="email" id="email" required>
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="komentar" required rows="20" cols="20" id="komentar"></textarea>
					
					<input type="hidden" name="idpost" id="idpost">

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>
				
	<ul id='comments'>
			
            </ul>
        </div>
    </div>

</article>
			<script type="text/javascript">
			
			function validateemail()
			{
				var returnval = false;
				var email = document.form1["email"].value;
				var at = email.indexOf("@");
				var dot = email.lastIndexOf(".");
					if (at < 1 || dot < at + 2 || dot + 2 >= email.length) {
				alert("Email tidak valid");
				}
				else returnval = true;
				return returnval;
			}
						
			function commentfunction() {
				// Create an XMLHttpRequest Object
				 if (window.XMLHttpRequest) {
					xmlHttpObj = new XMLHttpRequest( );
				} else {
					try {
						xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
						try {
							xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
						} catch (e) {
							xmlHttpObj = false;
						}
					}
				} 
				
				var id_post = <?php echo $_GET['id'] ?>;
				var nama = document.getElementById('nama').value;
				var email = document.getElementById('email').value;
				var komentar = document.getElementById('komentar').value;
				
				// Create a function that will receive data sent from the server
				if(validateemail()) {
					xmlHttpObj.open("GET", "dbinsertcomment.php?id=" + id_post + "&nama=" + nama + "&email=" + email + "&komentar=" + komentar, true);
					xmlHttpObj.send(null);
					xmlHttpObj.onreadystatechange = function() {
						if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
							document.getElementById("comments").innerHTML=xmlHttpObj.responseText;
						}
					}
				}
	}
						
						
						
						function panggilcomment() {
				// Create an XMLHttpRequest Object
				 if (window.XMLHttpRequest) {
					xmlHttpObj = new XMLHttpRequest( );
				} else {
					try {
						xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
						try {
							xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
						} catch (e) {
							xmlHttpObj = false;
						}
					}
				} 
				
				var id_post = <?php echo $_GET['id'] ?>;
				
				// Create a function that will receive data sent from the server
					xmlHttpObj.open("GET", "commentload.php?id=" + id_post, true);
					xmlHttpObj.send(null);
					xmlHttpObj.onreadystatechange = function() {
						if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
							document.getElementById("comments").innerHTML=xmlHttpObj.responseText;
						}
				}
	}
			</script>
						

<?php echo "<footer class='footer'>";
    echo "<div class='back-to-top'><a href=''>Back to top</a></div>";
    echo "<!-- <div class='footer-nav'><p></p></div> -->";
    echo "<div class='psi'>&Psi;</div>";
    echo "<aside class='offsite-links'>";
        echo "<a class='twitter-link' href='http://twitter.com/ivanaclairine'>Ivana Clairine</a> / 13512041";
        
    echo "</aside>";
echo "</footer>"; ?>

</div>

</body>
</html>