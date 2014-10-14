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

<script type="text/javascript">
function viewComment() { 
	if (window.XMLHttpRequest) {
	
		xmlhttp=new XMLHttpRequest();
	} 
	else { 
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("comment").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","view_comment.php?id="+<?php echo $_GET['id'];?>,true);
	xmlhttp.send();
	
}

function addComment() { 
	var nama = document.getElementById("Nama").value;
	var email = document.getElementById("Email").value;
	var komentar = document.getElementById("Komentar").value;
	var vars = "Nama="+nama+"&Email="+email+"&Komentar="+komentar;
	if (window.XMLHttpRequest) {
	
		xmlhttp=new XMLHttpRequest();
	} 
	else { 
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			//document.getElementById("comment").innerHTML=xmlhttp.responseText;
			viewComment();
		}
	}
	xmlhttp.open("POST","add_comment.php?id="+<?php echo $_GET['id'];?>,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(vars);
	return false;
}
</script>

</head>

<body class="default" onload="viewComment()">
<div class="wrapper">

<?php include 'header.php';?>

<?php
	$postId = $_GET['id'];
	$con=mysqli_connect("localhost","root","","simple_blog");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM post WHERE id='$postId'");
	$row = mysqli_fetch_array($result);
?>

<article class="art simple post">

    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo date("d F Y",strtotime($row['date'])); ?></time>
            <h2 class="art-title"><?php echo $row['title']; ?></h2>
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
                <form name="commentForm" method="post" action="#" onsubmit="return addComment()">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama" required>
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email" required>
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar" required></textarea>

                    <input type="submit" name="submit" value="Kirim" class="submit-button">
                </form>
            </div>

            <ul id="comment" class="art-list-body">
			
            </ul>
        </div>
    </div>

</article>

<?php include 'footer.php';?>

</div>

<script type="text/javascript">
	var emailField = document.forms["commentForm"]["Email"];
	var form = document.forms["commentForm"];
	function checkEmailValidity()
	{
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!re.test(emailField.value))
		{
			emailField.setCustomValidity('Invalid email address.');
		}
		else
		{
			emailField.setCustomValidity('');
		}
	}
	emailField.addEventListener('change', checkEmailValidity);
	function checkFormValidity()
	{
		checkEmailValidity();
        if (!this.checkValidity()) {
            event.preventDefault();
            emailField.focus();
        }
	}
	form.addEventListener('submit', checkFormValidity, false);
</script>

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