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
    <div class="art-body">
        <div class="art-body-inner">
			<h6 class = "art-body-inner"></h6>
			<?php
				$postId = $_GET['postId'];
				$con = mysqli_connect("localhost","root","","if3110-tugas1");
				if (mysqli_connect_errno()) {
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$result = mysqli_query($con, "SELECT * FROM post WHERE id_post = ".$postId);
				$row = mysqli_fetch_array($result);
				
				echo "<h6 class = \"art-body-inner\">".$row['tanggal_post']."</h6>";
				echo "<h2>".$row['judul']."</h2>";
				echo "<p class=\"art-subtitle\"></p>";
				echo "<p>".$row['konten']."</p>";
			?>
            
			<div style="border-bottom: 1px solid;"></div>
            <h2>Komentar</h2>
            <div id="contact-area">
				<?php
					$postId = $_GET['postId'];
					$con = mysqli_connect("localhost","root","","if3110-tugas1");
					if (mysqli_connect_errno()) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$result = mysqli_query($con, "SELECT * FROM post WHERE id_post = ".$postId);
					$row = mysqli_fetch_array($result);
					echo "<script type=\"text/javascript\">showComment(null,3)</script>";
					echo "<form method='post' action='javascript:void(0)' id = 'formkomentar' onsubmit = 'return validateEmail(this, ".$row['id_post'].")'>";
				?>
					<label for="Nama">Nama:</label>
					<input type="text" name="Nama" id="Nama">
					<label for="Email">Email:</label>
					<input type="text" name="Email" id="Email">
					<label for="Komentar">Komentar:</label><br>
					<textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>
					<input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body">
				<div id = "commentArea"> <div>
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

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">

	(function() {		
		var query_string = {};
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		var id;
		for (var i=0;i<vars.length;i++) {
			var pair = vars[i].split("=");
			id = pair[1];
			// If first entry with this name
			if (typeof query_string[pair[0]] === "undefined") {
				query_string[pair[0]] = pair[1];
				// If second entry with this name
			} else if (typeof query_string[pair[0]] === "string") {
				var arr = [ query_string[pair[0]], pair[1] ];
				query_string[pair[0]] = arr;
				// If third or later entry with this name
			} else {
			  query_string[pair[0]].push(pair[1]);
			}
		}
		showComment(null,3);
	})();
	
	function validateEmail(obj, id) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var result = re.test(obj.Email.value)
		if (result == false) {
			alert('email salah')
			obj.Email.select()
			obj.Email.setAttribute("style", "border-color: red;")
		} else {
			addToDatabase(obj,id)
		}
		return result;
	}
	
	function addToDatabase(obj,id) {
		var hr
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			hr = new XMLHttpRequest();
		} else { // code for IE6, IE5
			hr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		// Create some variables we need to send to our PHP file
		var url = "insertComment.php";
		var vars = "id_post="+id+"&email="+obj.Email.value+"&komentar="+obj.Komentar.value+"&nama="+obj.Nama.value;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				showComment(obj, id)
			}
		}
		hr.send(vars); // Actually execute the request
	
	}
	
	function showComment(obj, id) {
		console.log("WOI MASUK WOI")
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("commentArea").innerHTML = xmlhttp.responseText;
				console.log(xmlhttp.responseText)
			}
		}
		xmlhttp.open("GET","load_comment.php?postId=" + id,true);
		xmlhttp.send();
	}
</script>

</body>
</html>