<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<title>Simple Blog</title>
</head>

<body class="default">
<img src="assets/img/bg.png" class="background">
<img src="assets/img/navbackground.png" class="navbackground">
<div class="wrapper">

<nav class="nav">
    
    <div class="logologo">
      <img src="assets/img/navicon.png" class="navicon">
      <a id="logo" href="index.php"><img src="assets/img/icontext.png" class="icontext"></a>
    </div>
    <ul class="nav-primary">
        <li><a href="new_post.php">+ Tambah Post</a></li>
    </ul>
</nav>

<div id="home">
    <div class="posts">
    <nav class="art-list">
	
	<?php
		$con = mysqli_connect("localhost", "root", "", "wbd");

		if(mysqli_connect_errno()){
			echo "Failed to connect to mysql server";
		}

		$query = "DELETE FROM post WHERE id=".$_GET['post-id'];

		if(!mysqli_query($con, $query)){
			die('Error: ' . mysqli_error($con));
		}else{
			echo "Post successfully deleted";
		}

		mysqli_close($con);
	?>
	
	<br>
	<a href="index.php">Back to home</a>
	</nav>
	</div>
</div>

<footer class="footer">
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Gilang Julian S. / 13512045
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>


