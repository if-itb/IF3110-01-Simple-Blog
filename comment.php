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

		$postid = $_POST['post-id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$content = $_POST['content'];
		$date = $_POST['date'];

		$query = "INSERT INTO comment (post_id, name, email, content, date)
					VALUES ('$postid', '$name', '$email', '$content', '$date')";

		if(!mysqli_query($con, $query)){
			die('Error: ' . mysqli_error($con));
		}else{
			echo "Comment successfully added";
		}

		mysqli_close($con);
	?>
	
	<br>
	<a href="post.php?post-id=<?php echo $postid; ?>">Back to post</a>
	</nav>
	</div>
</div>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</body>
</html>


