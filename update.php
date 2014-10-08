<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<title>Simple Blog</title>
</head>
<body class="default">

<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
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

		$title = mysqli_real_escape_string($con, $_POST['title']);
		$date = mysqli_real_escape_string($con, $_POST['date']);
		$content = mysqli_real_escape_string($con, $_POST['content']);

		$query = "UPDATE post SET title = '" . $title . "', date = '" . $date . "', content = '" . $content . "' WHERE id = " . $_POST['post-id'];

		if(!mysqli_query($con, $query)){
			die('Error: ' . mysqli_error($con));
		}else{
			echo "Post successfully edited";
		}

		mysqli_close($con);
	?>
	<br>
	<a href="index.php">Back to home</a>
	</nav>
	</div>
</div>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>


