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

		$postid = $_POST['post-id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$content = $_POST['content'];
		$date = date("Y-m-d");

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


